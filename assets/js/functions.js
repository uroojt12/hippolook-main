var needToConfirm = false;
// var formatter = new Intl.NumberFormat('de-DE', {
var formatter = new Intl.NumberFormat('en-US', {
  style: 'currency',
  currency: 'USD',
  minimumFractionDigits: 2,
});
// formatter.format(2500);

function empty($value){
    return (!$value || $value===null || (typeof $value==='undefined') || $value==='' || $value===false || $value==0  || $value.length < 1 )? true : false;
}
/*
String.prototype.usfirst = function() {
    return this.charAt(0).toUpperCase() + this.slice(1);
}
*/

function usfirst(str) {
    if (!empty(str))
        return str.charAt(0).toUpperCase() + str.slice(1);
    return '';
}

function format_date(d, frmt='mm/dd/yy'){
    return $.datepicker.formatDate(frmt, new Date(d));
}

function getTomorrow(d='') {
    let tomorrow = null;
    if (!empty(d))
        tomorrow = new Date(format_date(d, 'yy-mm-dd'));
    else
        tomorrow = new Date();
    tomorrow.setDate(tomorrow.getDate() + 1); // even 32 is acceptable
    return `${tomorrow.getFullYear()}-${tomorrow.getMonth() + 1}-${tomorrow.getDate()}`;
}

// Returns an array of dates between the two dates
function getDates(startDate, endDate) {
    startDate = new Date(format_date(startDate, 'yy-mm-dd'));
    endDate = new Date(format_date(endDate, 'yy-mm-dd'));
    let dates = [],
    currentDate = startDate,
    addDays = function(days) {
        let date = new Date(this.valueOf());
        date.setDate(date.getDate() + days);
        return date;
    };
    while (currentDate < endDate) {
        dates.push(currentDate);
        currentDate = addDays.call(currentDate, 1);
    }
    return dates;
};

// Usage
/*var dates = getDates('05/18/2020', '05/20/2020');                                                                         
dates.forEach(function(date) {
    console.log(date.toISOString().split("T")[0]);
});
*/
function dateDiffInDays(d1, d2) {
    a = new Date(d1);
    b = new Date(d2);
    let _MS_PER_DAY = 1000 * 60 * 60 * 24;
    let utc1 = Date.UTC(a.getFullYear(), a.getMonth(), a.getDate());
    let utc2 = Date.UTC(b.getFullYear(), b.getMonth(), b.getDate());

    return intval(Math.floor((utc2 - utc1) / _MS_PER_DAY));
}
/*difference = dateDiffInDays("2020-05-05", "2020-05-05");
console.log(difference);*/

function floatval(number){
    return parseFloat(number)||0;
}
function intval(number){
    return parseInt(number)||0;
}
function round(number){
    return parseFloat((number).toFixed(2));
}
function confirmExit()
{
    if (needToConfirm)
      return "You have attempted to leave this page while form submission is in progress. Are you sure?";
}
function refresh_rateYo(){
    $('.rateYo').rateYo({
        fullStar: true,
        normalFill: '#ddd',
        ratedFill: '#f6a623',
        starWidth: '14px',
        spacing: '2px'
    });
}

function refresh_selectpicker(){
    $('.selectpicker').selectpicker('refresh');
}

function refresh_datepicker($class = '.datepicker'){
    $($class).datepicker({
        multidate: false,
        // format: 'mm-dd-yyyy',
        orientation: 'bottom auto',
        dateFormat: 'mm/dd/yy',
        todayHighlight: true,
        multidateSeparator: ',  ',
        templates : {
            leftArrow: '<i class="fi-arrow-left"></i>',
            rightArrow: '<i class="fi-arrow-right"></i>'
        }
    });
}
function reset_datepicker() {
    $('.datepicker').val("").datepicker("update");
}
function refresh_timepicker() {
    // $('.timepicker').timepicki('refresh');
    $('.timepicker').timepicki({
        reset: true,
        step_size_minutes: 15,
        overflow_minutes:true,
        start_time: ["12", "00", "AM"],
        disable_keyboard_mobile: true
    });
}

/*** start social sharing ***/

function shareLinkedin(url, title) {
    window.open('https://www.linkedin.com/shareArticle?mini=true&url=' + url + '&title=' + title, 'sharer', 'toolbar=0,status=0,width=548,height=325,top=170,left=400');
}
function shareFacebook(url, title) {
    window.open('http://www.facebook.com/sharer/sharer.php?u=' + url + '&t=' + title, 'sharer', 'toolbar=0,status=0,width=548,height=325,top=170,left=400');
}
function shareTwitter(url, title) {
    window.open('https://twitter.com/home?status=' + title + ' ' + url + '', 'sharer', 'toolbar=0,status=0,width=548,height=325,top=170,left=400');
}
function shareGoogle(url, title) {
    window.open('https://plus.google.com/share?url=' + url + '&title=' + title, 'sharer', 'toolbar=0,status=0,width=548,height=325,top=170,left=400');
}
function sharePinterest(url, image, title) {
    window.open('https://pinterest.com/pin/create/button/?url=' + url + '&media=' + image + '&description=' + title, 'sharer', 'toolbar=0,status=0,width=548,height=325,top=170,left=400');
}
function shareWhatsapp(title) {
    document.location = 'whatsapp://send?text=' + title;
}
/*** end social sharing ***/