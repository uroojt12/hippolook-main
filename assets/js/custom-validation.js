$(document).ready(function () {
    var input = document.querySelector("#phone")
    if((typeof input !== 'undefined') && input)
    {
        var errorMap = [ "Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];
        var iti = window.intlTelInput(input, {
            // initialCountry: "auto",
            separateDialCode: true ,
            hiddenInput: "full_phone",
            // nationalMode: true,
            allowDropdown: true,
            onlyCountries: ["al", "ad", "at", "by", "be", "ba", "bg", "hr", "cz", "dk",
  "ee", "fo", "fi", "fr", "de", "gi", "gr", "va", "hu", "is", "ie", "it", "lv",
  "li", "lt", "lu", "mk", "mt", "md", "mc", "me", "nl", "no", "pl", "pt", "ro",
  "ru", "sm", "rs", "sk", "si", "es", "se", "ch", "ua", "gb"],
            initialCountry: 'nl',
            /*geoIpLookup: function(callback) {
                $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
                    var countryCode = (resp && resp.country) ? resp.country : "";
                    callback(countryCode);
                });
            },*/
            utilsScript: base_url+"assets/intltelinput/utils.js"
        });
        iti.promise.then(function() {
            // input.value = iti.getNumber();
        });
        var itihandleChange = function() {
            iti.setNumber(input.value)
        };
        input.addEventListener('change', itihandleChange);
        input.addEventListener('keyup', itihandleChange);

        $.validator.addMethod(
            "valid_phone", 
            function(value, element) {
                if (input.value.trim()) {
                    if (iti.isValidNumber()) {
                        // $('#phnMsg').addClass('vald').removeClass('hide invald').text('Valid');
                        $('#phnMsg').addClass('hide').removeClass('hide invald invald').text('');
                        // element.value =iti.getNumber();
                        return true;
                    } else {
                        var errorCode = iti.getValidationError();
                        $('#phnMsg').addClass('invald').removeClass('hide vald').text(errorMap[errorCode]);
                        return false;
                    }
                }
            }
            );
        }
        /*
        $.validator.addMethod("pwcheck", function(value) {
            return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
            && /[a-z]/.test(value) // has a lowercase letter
            && /\d/.test(value) // has a digit
            && /([!,%,&,@,#,$,^,*,?,_,~])/.test(value) // has a special char
        }, "Please select strong password!");
        */

        $.validator.addMethod("pwcheck", function(value, element) {
            /*if (value.length<8) {
                $(element).data('error', "Password must contains at least 8 character");
                return false;
            }*/
            if (!(/[a-z]/.test(value))) {
                $(element).data('error', "Password must contains at least 1 small letter");
                return false;
            }
            if (!(/[A-Z]/.test(value))) {
                $(element).data('error', "Password must contains at least 1 capital letter");
                return false;
            }
            if (!(/\d/.test(value))) {
                $(element).data('error', "Password must contains at least 1 number");
                return false;
            }
            if (!(/([!,%,&,@,#,$,^,*,?,_,~])/.test(value))) {
                $(element).data('error', "Password must contains at least 1 special character");
                return false;
            }
            $(element).data('error', "");
            return true;
        }, function(params, element) {
            return $(element).data('error');
        });

        $.validator.addMethod("atlease_one", function(value, elem, param) {
            return $(".atlst_one:checkbox:checked").length > 0;
        },"You must select at least one!");

        $.validator.addClassRules({
            arrFld:{
                required: true,
                number: true,
                minlength: 1,
                maxlength: 1,
                min: 0,
                max: 9
            }
        });
        $.validator.addClassRules({
            strArrFld:{
                required: true
            }
        });
        $.validator.addClassRules({
            atlst_one:{
                atlease_one: true,
            }
        });
        $.validator.addMethod(
            "multiemail",
            function(value, element) {
               if (this.optional(element))
                 return true;
             var emails = value.split(',');
         // var emails = value.split(/[;,]+/);
             valid = true;
             for (var i in emails) {
                value = emails[i];
                valid = valid && $.validator.methods.email.call(this, $.trim(value), element);
            }
            return valid;
        },
        'Please enter all emails in valid format'
        );

        $('#frmSearch').validate({ 
            rules: {
                q: {
                    required: true,
                }
            },
            errorPlacement: function(){
            return false;  // suppresses error message text
        }
    });
        $('#frmChangePass').validate({
            // errorElement: 'div',
            rules: {
                pswd: {
                    required: true,
                },
                npswd: {
                    required: true,
                    // pwcheck: true,
                    minlength:8
                },
                cpswd: {
                    required: true,
                    // pwcheck: true,
                    minlength:8,
                    equalTo:'#npswd'
                }
            },
            errorPlacement: function(error, element) {
                return false;
            }
        });

        $('#frmEmail').validate({
            rules: {
                email: {
                    required: true,
                    email:true
                }
            },
            errorPlacement: function(){
               return false;  // suppresses error message text
            }
        });

        $('#frmDob').validate({
            rules: {
                dob: {
                    required: true,
                }
            },
            errorPlacement: function(){
               return false;  // suppresses error message text
            }
        });

        $('#frmPaypal').validate({
            rules: {
                paypal: {
                    required: true,
                    email:true
                }
            },
            errorPlacement: function(){
            return false;  // suppresses error message text
        }/*,
        messages: {
            cpswd:{
                equalTo: "Please enter same password as above"
            }
        }*/
    })
        $('#frmSignup').validate({
            // errorContainer: $(this).find('div.alertMsg:first'),
            // errorLabelContainer: $(this).find('div.alertMsg:first'),
            errorElement: 'div',
            // errorClass: 'alert alert-danger alert-sm',
            rules: {
                fname: {
                    required: true,
                },
                lname: {
                    required: true,
                },
                email: {
                    required: true,
                    email:true
                },
                /*phone: {
                    required: true,
                    valid_phone: true,
                    // phoneUS: true,
                    // digits: true,
                    // maxlength: 10
                },*/
                password: {
                    required: true,
                    minlength:8,
                    // pwcheck: true,
                }/*,
                cpassword: {
                    required: true,
                    equalTo:'#password'
                },*/
            },
            messages: { 
                password: {
                    required: "Password required!",
                    minlength: "Password must be at least 8 characters.",
                }/*,
                cpassword: {
                    required: "Confirm password required!",
                    equalTo: "Confirm password must be the same as the password!"
                }*/
            },
            errorPlacement: function(error, element) {
                if($.inArray(element.attr('id'), ['password', 'cpassword']) !== -1 && error.text()!='This field is required.') {
                    error.addClass('alert alert-danger alert-sm')
                    error.appendTo(element.parents('form').find("div.alertMsg:first").show());
                    $("html, body").animate({ scrollTop: (element.parents('form').find("div.alertMsg:first").offset().top - 300) }, "slow");
                }
                return false;
            }
        })
        $('#frmInfo').validate({
            rules: {
                fname: {
                    required: true,
                },
                lname: {
                    required: true,
                },
                email: {
                    required: true,
                    email:true
                },
                /*phone: {
                    required: true,
                    valid_phone: true,
                    // phoneUS: true,
                    // digits: true,
                    // maxlength: 10
                },*/
                password: {
                    required: true,
                    minlength:8,
                    // pwcheck: true,
                },
                /*cpassword: {
                    required: true,
                    equalTo:'#password'
                },*/
                ship_fname: {
                    required: true,
                },
                ship_lname: {
                    required: true,
                },
                ship_address: {
                    required: true,
                },
                ship_house_number: {
                    required: true,
                },
                ship_zip: {
                    required: true,
                },
                ship_city: {
                    required: true,
                },
                ship_country: {
                    required: true,
                },
                ship_phone: {
                    required: true,
                },
            },
            errorPlacement: function(error, element) {
                return false;
            }
        })
        $('#frmCart').validate({
            rules: {
                size: {
                    required: true,
                },
                color: {
                    required: true,
                }
            },
            errorPlacement: function(){
                return false;  // suppresses error message text
            }
        })
        $('#frmLogin').validate({
            rules: {
                email: {
                    required: true,
                    email:true
                },
                password: {
                    required: true,
                }
            },
            errorPlacement: function(){
                return false;  // suppresses error message text
            }
        })
        $('#frmForgot').validate({
            rules: {
                email: {
                    required: true,
                    email:true
                }
            },
            errorPlacement: function(){
            return false;  // suppresses error message text
        }/*,
        messages: {
            email:{
                required: "Email required",
                email: "Please enter valid email"
            }
        }*/
    })
        $('#frmReset').validate({
            errorElement: 'div',
            rules: {
                pswd: {
                    required: true,
                    minlength:8,
                    // pwcheck: true
                }/*,
                cpswd: {
                    required: true,
                    minlength:8,
                    pwcheck: true,
                    equalTo:'#pswd'
                }*/
            },
            messages: {
                pswd: {
                    required: "Password required!",
                    minlength: "Password must be at least 8 characters.",
                }/*,
                cpswd: {
                    required: "Confirm password required!",
                    equalTo: "Confirm password must be the same as the password!"
                }*/
            },
            errorPlacement: function(error, element) {
                if($.inArray(element.attr('id'), ['password', 'cpassword']) !== -1 && error.text()!='This field is required.') {
                    error.addClass('alert alert-danger alert-sm')
                    error.appendTo(element.parents('form').find("div.alertMsg:first").show());
                    $("html, body").animate({ scrollTop: (element.parents('form').find("div.alertMsg:first").offset().top - 300) }, "slow");
                }
                return false;
            }
        });
        $('#frmSetting').validate({
            rules: {
                fname: {
                    required: true,
                },
                lname: {
                    required: true,
                },
                address: {
                    required: true,
                },
                house_number: {
                    required: true,
                },
                zip: {
                    required: true,
                },
                country: {
                    required: true,
                }
            },
            errorPlacement: function(){
                return false;  // suppresses error message text
            }
        })

        $('#frmAdditionalSubjects').validate({
            rules: {
                subject: {
                    required: true,
                    number: true,
                },
                'subjects[]': {
                    atlease_one: true,
                }
            },
            errorPlacement: function(){
                return false;  // suppresses error message text
            }
        });
        
        $('#frmContact').validate({
            rules: {
                name: {
                    required: true,
                },
                email: {
                    required: true,
                    email:true
                },
                msg: {
                    required: true,
                    minlength:2,
                }
            },
            errorPlacement: function(){
                return false;  // suppresses error message text
            }
        });
        $('#frmNewsletter').validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                }
            },
            errorPlacement: function(){
                return false;  // suppresses error message text
            }
        });
    /*$('#frmRpt').validate({
        rules: {
            reason: {
                required: true,
            }
        },
        errorPlacement: function(){
            return false;  // suppresses error message text
        }
    })*/
    $('#frmNt').validate({
        rules: {
            title: {
                required: true,
            },
            detail: {
                required: true,
            }
        },
        errorPlacement: function(){
            return false;  // suppresses error message text
        }
    })
    
    $('#frmPhone').validate({ 
        rules: {
            phone: {
                required: true,
                valid_phone: true,
                // phoneUS: true,
                // digits: true,
                // maxlength: 10
            }
        },
        errorPlacement: function(){
            return false;  // suppresses error message text
        }
    });

    $("#frmPhonevld").validate({errorPlacement: function(){return false;}});
    /*$("#frmPhonevld").validate({
        ignore: [],
        rules: {
            'code[]': {
                required: true,
                number: true,
                minlength: 1,
                maxlength: 1,
                min: 0,
                max: 9
            }
        },
        errorPlacement: function(){
            return false;  // suppresses error message text
        }
    });*/

    $('#frmChangeEmail').validate({ 
        rules: {
            email: {
                required: true,
                email:true
            }
        },
        errorPlacement: function(){
            return false;  // suppresses error message text
        }
    });

    $('#frmCreditCard').validate({
        rules: {
            card_holder_name: {
                required: true,
            },
            cardnumber: {
                required: true,
                // number: true,
                maxlength: 19
            },
            exp_month: {
                required: true,
            },
            exp_year: {
                required: true,
            },
            cvc: {
                required: true,
                maxlength: 4
            }
        },errorPlacement: function(){
            return false;
        }
    });

    $('#frmBnkAct').validate({ 
        rules: {
            /*swift_code: {
                required: true,
                number: true
            },*/
            routing_number: {
                required: true,
                number: true
            },
            bank_name: {
                required: true
            },
            account_title: {
                required: true,
            },
            account_number: {
                required: true,
                number: true
            },
            caccount_number: {
                required: true,
                number: true,
                equalTo:'#account_number'
            },
            city: {
                required: true
            },
            state: {
                required: true
            }
        },errorPlacement: function(){
            return false;
        }

    });

    $('#frmBkLsn').validate({ 
        rules: {
            date: {
                required: true
            },
            time: {
                required: true
            },
            hours: {
                required: true,
                number: true
            },
            address: {
                required: true
            }
        },errorPlacement: function(){
            return false;
        }

    });

    $('#frmPet').validate({ 
        rules: {
            pet_type: {
                required: true
            },
            name: {
                required: true
            },
            weight: {
                required: true,
                number: true
            }
        },errorPlacement: function(){
            return false;
        }

    });

    $('#frmInvtFrnd').validate({ 
        rules: {
            emails: {
                required: true,
                multiemail: true
            }
        },errorPlacement: function(){
            return false;
        }

    });

    $('#rprt-form').validate({ 
        rules: {
            emails: {
                required: true,
                multiemail: true
            }
        },errorPlacement: function(){
            return false;
        }

    });

    $('#frmShipping').validate({
        rules: {
            ship_fname: {
                required: true,
            },
            ship_lname: {
                required: true,
            },
            ship_zip: {
                required: true,
            },
            ship_city: {
                required: true,
            },
            ship_state: {
                required: true,
            },
            ship_phone: {
                required: true,
            },
            ship_address: {
                required: true,
            }
        },
        errorPlacement: function(){
            return false;  // suppresses error message text
        }
    });
});
