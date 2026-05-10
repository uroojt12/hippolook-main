const imageInput = document.getElementById("uploadImage");
const video = document.getElementById("video");
const canvas = document.getElementById("canvas");
const ctx = canvas.getContext("2d");
const openCameraBtn = document.getElementById("openCamera");
const takePhotoBtn = document.getElementById("takePhoto");

// ✅ Load Glasses Image
const glassesImage = new Image();
// glassesImage.src = glassesImagePath;
glassesImage.src = "../../uploads/images/Adobe Express - file (33).png";
//
// ✅ Handle File Upload
imageInput.addEventListener("change", (event) => {
	const file = event.target.files[0];
	if (!file) return;

	const reader = new FileReader();
	reader.onload = (event) => {
		const img = new Image();
		img.src = event.target.result;
		img.onload = () => {
			drawOnCanvas(img);
			detectFaceAndApplyGlasses(); // Face detect karne ka function call karega
		};
	};
	reader.readAsDataURL(file);
});

// ✅ Open Camera (Fullscreen)
openCameraBtn.addEventListener("click", async () => {
	try {
		const stream = await navigator.mediaDevices.getUserMedia({ video: true });
		video.srcObject = stream;
		video.classList.remove("hidden");
		takePhotoBtn.classList.remove("hidden");

		// ✅ Make Fullscreen & centered
		// video.style.width = "70vw";
		// video.style.height = "70vh";
		// video.style.position = "fixed";
		// video.style.top = "50%";
		// video.style.left = "50%";
		// video.style.transform = "translate(-50%, -50%)"; // Center the video
		// video.style.objectFit = "cover";
		// ✅ Make Fullscreen
		video.style.width = "100vw";
		video.style.height = "100vh";
		video.style.position = "fixed";
		video.style.top = "0";
		video.style.left = "0";
		video.style.objectFit = "cover";
	} catch (error) {
		console.error("Camera access denied!", error);
		alert("Camera access is required to use this feature.");
	}
});

// ✅ Capture Photo
takePhotoBtn.addEventListener("click", () => {
	drawOnCanvas(video);

	// ✅ Stop Camera
	video.srcObject.getTracks().forEach(track => track.stop());
	video.classList.add("hidden");
	takePhotoBtn.classList.add("hidden");

	detectFaceAndApplyGlasses(); // Face detect aur glasses apply karega
});

//  Draw Image on Canvas
function drawOnCanvas(image) {
	canvas.width = image.width || video.videoWidth;
	canvas.height = image.height || video.videoHeight;
	ctx.drawImage(image, 0, 0, canvas.width, canvas.height);
}

//  Load Face Detection Models
async function loadModels() {
	await faceapi.nets.tinyFaceDetector.loadFromUri("assets/js");
	await faceapi.nets.faceLandmark68Net.loadFromUri("assets/js");
	console.log("Face API Models Loaded Successfully");
}
loadModels();

// ✅ Detect Face & Apply Glasses
async function detectFaceAndApplyGlasses() {
	console.log("🔹 Face Detection Start...");

	const detections = await faceapi.detectSingleFace(canvas, new faceapi.TinyFaceDetectorOptions())
		.withFaceLandmarks();

	if (!detections) {
		console.warn("⚠️ No face detected!");
		alert("No face detected. Showing image without glasses.");
		return;
	}

	console.log("✅ Face Detected:", detections);

	const leftEye = detections.landmarks.getLeftEye();
	const rightEye = detections.landmarks.getRightEye();
	const glassesWidth = Math.abs(rightEye[3].x - leftEye[0].x) * 2.5;
	const glassesHeight = glassesWidth / 2;
	const glassesX = leftEye[0].x - (glassesWidth * 0.3);
	const glassesY = leftEye[0].y - (glassesHeight * 0.55);

	ctx.drawImage(glassesImage, glassesX, glassesY, glassesWidth, glassesHeight);
}
const videoElement = document.getElementById("video-live");
const glassesElement = document.getElementById("glasses-live");
const livePreviewBtnElement = document.getElementById("livePreviewBtn-live");
const faceWarningElement = document.getElementById("face-warning-live");
const modalElement = document.getElementById("camera-modal-live");
const closeModalElement = document.querySelector(".close-live");

// Oval Frame Size
const OVAL_WIDTH = 400; // Increased width
const OVAL_HEIGHT = 500; // Increased height
const OVAL_CENTER_X = OVAL_WIDTH / 2;
const OVAL_CENTER_Y = OVAL_HEIGHT / 2;

// Set glasses image dynamically
// glassesElement.src = glassesImagePath;
glassesElement.src = "../../uploads/images/Adobe Express - file (33).png";

// Load Face API Models
async function loadModels() {
	try {
		await faceapi.nets.tinyFaceDetector.loadFromUri("models");
		await faceapi.nets.faceLandmark68Net.loadFromUri("models");
		console.log("Face API Models Loaded Successfully");
	} catch (error) {
		console.error("Error loading models:", error);
	}
}

// Start Live Preview
async function startLivePreview() {
	try {
		const stream = await navigator.mediaDevices.getUserMedia({ video: {} });
		videoElement.srcObject = stream;
		modalElement.style.display = "flex";

		await new Promise(resolve => {
			videoElement.onloadedmetadata = () => resolve();
		});

		detectFaceInVideo();
	} catch (error) {
		console.error("Error accessing camera: ", error);
		alert("Please allow camera access to use this feature.");
	}
}

// Detect Face & Adjust Glasses
let lastDetectedPosition = null; // Last known good position
let missingFrames = 0; // Counter for frames where face is not detected
const MAX_MISSING_FRAMES = 5; // Allow up to 5 frames before hiding glasses

async function detectFaceInVideo() {
	const detect = async () => {
		if (videoElement.paused || videoElement.ended) return;

		try {
			const detections = await faceapi.detectSingleFace(
				videoElement,
				new faceapi.TinyFaceDetectorOptions()
			).withFaceLandmarks();

			if (detections) {
				const leftEye = detections.landmarks.getLeftEye();
				const rightEye = detections.landmarks.getRightEye();
				const nose = detections.landmarks.getNose();

				const faceCenterX = nose[3].x;
				const faceCenterY = nose[3].y;

				// ✅ Oval ke andar hai ya nahi
				const isInsideOval = (
					(Math.pow(faceCenterX - OVAL_CENTER_X, 2) / Math.pow(OVAL_WIDTH / 2, 2)) +
					(Math.pow(faceCenterY - OVAL_CENTER_Y, 2) / Math.pow(OVAL_HEIGHT / 2, 2))
				) <= 1;

				if (!isInsideOval) {
					missingFrames++;
					if (missingFrames >= MAX_MISSING_FRAMES) {
						glassesElement.style.display = "none";
						faceWarningElement.style.display = "block";
					}
					requestAnimationFrame(detect);
					return;
				} else {
					missingFrames = 0;
					glassesElement.style.display = "block";
					faceWarningElement.style.display = "none";
				}

				// ✅ Eye Center Calculation
				const eyeCenterX = (leftEye[0].x + rightEye[3].x) / 2;
				const eyeCenterY = (leftEye[0].y + rightEye[3].y) / 2;

				const eyeDistance = Math.hypot(
					rightEye[3].x - leftEye[0].x,
					rightEye[3].y - leftEye[0].y
				);

				// ✅ Responsive Glasses Size & Position
				let glassesWidth, glassesHeight, glassesLeft, glassesTop;
				if (window.innerWidth <= 600) {
					// 📱 Mobile Settings
					glassesWidth = eyeDistance * 2.5;
					glassesHeight = glassesWidth / 1.7;
					glassesLeft = eyeCenterX - glassesWidth / 2.75; // Mobile ke liye left shift kam
					glassesTop = eyeCenterY - glassesHeight / 11.5; // Mobile ke liye top shift kam
				} else {
					// 💻 Desktop Settings
					glassesWidth = eyeDistance * 3.3;
					glassesHeight = glassesWidth / 1.5;
					glassesLeft = eyeCenterX - glassesWidth / 2.1;
					glassesTop = eyeCenterY - glassesHeight / 2.5 + 10;
				}

				// ✅ Smooth Transition
				if (lastDetectedPosition) {
					glassesElement.style.left = `${(lastDetectedPosition.left + glassesLeft) / 2}px`;
					glassesElement.style.top = `${(lastDetectedPosition.top + glassesTop) / 2}px`;
					glassesElement.style.width = `${(lastDetectedPosition.width + glassesWidth) / 2}px`;
					glassesElement.style.height = `${(lastDetectedPosition.height + glassesHeight) / 2}px`;
				} else {
					glassesElement.style.left = `${glassesLeft}px`;
					glassesElement.style.top = `${glassesTop}px`;
					glassesElement.style.width = `${glassesWidth}px`;
					glassesElement.style.height = `${glassesHeight}px`;
				}

				glassesElement.style.transition = 'all 0.1s ease-out';

				// ✅ Store last detected position
				lastDetectedPosition = { left: glassesLeft, top: glassesTop, width: glassesWidth, height: glassesHeight };
			} else {
				missingFrames++;
				if (missingFrames >= MAX_MISSING_FRAMES) {
					glassesElement.style.display = "none";
					faceWarningElement.style.display = "block";
				}
			}
		} catch (error) {
			console.error("Detection error:", error);
		}

		requestAnimationFrame(detect);
	};

	// ✅ Automatically Adjust on Window Resize
	window.addEventListener("resize", detect);
	detect();
}

// Button Click to Start Live Preview
livePreviewBtnElement.addEventListener("click", startLivePreview);

// Close Modal
closeModalElement.addEventListener("click", () => {
	modalElement.style.display = "none";

	if (videoElement.srcObject) {
		videoElement.srcObject.getTracks().forEach(track => track.stop());
	}
});

// Initialize models
loadModels().catch(error => console.error("Model loading failed:", error));

// Open Chart
document.getElementById("openChart").addEventListener("click", function () {
	document.getElementById("chartOverlay").style.display = "flex";
	adjustSizeChart(); // Adjust size chart when opened
});

// Close Chart
document.getElementById("closeChart").addEventListener("click", function () {
	document.getElementById("chartOverlay").style.display = "none";
});

const sizeChart = document.getElementById("sizeChart");
const resizer = document.querySelector(".resizer");
const sizeLabel = document.getElementById("sizeLabel");

let isResizing = false;
let startX, startWidth;

// Mouse Down on Resizer
resizer.addEventListener("mousedown", (e) => {
	isResizing = true;
	startX = e.clientX;
	startWidth = sizeChart.offsetWidth;

	document.addEventListener("mousemove", resizeChart);
	document.addEventListener("mouseup", () => {
		isResizing = false;
		document.removeEventListener("mousemove", resizeChart);
	});
});

// Resize Function (Left Fixed, Right Resizable)
function resizeChart(e) {
	if (!isResizing) return;

	const mode = resizer.getAttribute("data-mode");

	if (mode === "horizontal") {
		let newWidth = startWidth + (e.clientX - startX);
		if (newWidth < 50) newWidth = 50;
		if (newWidth > 600) newWidth = 600;
		sizeChart.style.width = newWidth + "px";
		updateSizeLabel(newWidth);
	} else if (mode === "vertical") {
		let newHeight = startWidth + (e.clientY - startX); // Y-axis change
		if (newHeight < 200) newHeight = 200;
		if (newHeight > 800) newHeight = 800;
		sizeChart.style.height = newHeight + "px";
		updateSizeLabel(newHeight); // Optional: Show height instead of width
	}
}

// Live Update Using MutationObserver
const observer = new MutationObserver(() => {
	let widthPx = sizeChart.offsetWidth;
	updateSizeLabel(widthPx);
});

observer.observe(sizeChart, { attributes: true, attributeFilter: ["style"] });

// Update Size Label
function updateSizeLabel(value) {
	const isPortrait = window.matchMedia("(orientation: portrait)").matches;
	const isSmall = window.innerWidth <= 600;

	if (isSmall && isPortrait) {
		sizeLabel.textContent = `Height: ${value}px`;
		return;
	}

	if (value <= 300) {
		sizeLabel.textContent = `Size: Small (${value}px)`;
	} else if (value > 300 && value <= 500) {
		sizeLabel.textContent = `Size: Medium (${value}px)`;
	} else if (value > 501 && value <= 600) {
		sizeLabel.textContent = `Size: Large (${value}px)`;
	} else {
		sizeLabel.textContent = `Size: Extra Large (${value}px)`;
	}
}

// Function to adjust size chart based on orientation and screen size
function adjustSizeChart() {
	const isPortrait = window.matchMedia("(orientation: portrait)").matches;
	const isSmallScreen = window.innerWidth <= 600;

	if (isSmallScreen && isPortrait) {
		// Small screen + portrait: Resize vertically (Y-axis)
		sizeChart.style.width = "90vw";
		sizeChart.style.height = "300px"; // Initial height
		sizeChart.style.left = "0";
		sizeChart.style.margin = "0 auto";
		resizer.style.width = "100%";
		resizer.style.height = "10px";
		resizer.style.cursor = "ns-resize";
		resizer.style.position = "absolute";
		resizer.style.bottom = "0";
		resizer.style.right = "0";
		resizer.style.left = "0";
		resizer.style.top = "unset";
		resizer.setAttribute("data-mode", "vertical");
	} else {
		// All other cases: Landscape (X-axis resizing)
		sizeChart.style.width = "500px";
		sizeChart.style.height = "80vh";
		sizeChart.style.left = "auto";
		sizeChart.style.margin = "0 auto";
		resizer.style.width = "10px";
		resizer.style.height = "100%";
		resizer.style.cursor = "ew-resize";
		resizer.style.position = "absolute";
		resizer.style.right = "0";
		resizer.style.top = "0";
		resizer.style.left = "unset";
		resizer.style.bottom = "unset";
		resizer.setAttribute("data-mode", "horizontal");
	}
}

// Add event listener for orientation change and resize
window.addEventListener("orientationchange", adjustSizeChart);
window.addEventListener("resize", adjustSizeChart);

// Initial adjustment
adjustSizeChart();
