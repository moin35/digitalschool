var Script = function () {

    $().ready(function() {
        // validate the comment form when it is submitted
        $("#commentForm").validate();

        // validate signup form on keyup and submit
        $("#signupFormt").validate({
            rules: {
                firstname: "required",
                lastname: "required",
                username: {
                    required: true,
                    minlength: 2
                },
                password: {
                    required: true,
                    minlength: 5
                },
                confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                guardian_name: {
                    required: true,

                },
                gender: {
                    required: true,

                },
                religion: {
                    required: true,

                },
                address: {
                    required: true,

                },
                class: {
                    required: true,

                },
                section: {
                    required: true,

                },
                roll: {
                    required: true,

                },
                user_type: {
                    required: true,

                },
                phone: {
                    required: true,

                },

                topic: {
                    required: "#newsletter:checked",
                    minlength: 2
                },
                agree: "required"
            },
            messages: {
                firstname: "Please enter your firstname",
                lastname: "Please enter your lastname",
                username: {
                    required: "Please enter a username",
                    minlength: "Your username must consist of at least 2 characters"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                confirm_password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Please enter the same password as above"
                },
                phone: "Please enter a valid Phone No",
                user_type: "Please enter a user type",
                roll: "Please enter a roll no.",
                section: "Please enter a valid section",
                class: "Please enter a class",
                address: "Please enter a valid  address",
                gender: "Please enter a valid gender",
                guardian_name: "Please enter a guardian name",
                agree: "Please accept our policy"
            }
        });
        // validate signup form on keyup and submit
        $("#signupinstute").validate({
            rules: {
                institute_name: "required",

                icode: {
                    required: true,
                    minlength: 10
                },
                password: {
                    required: true,
                    minlength: 5
                },                
                division: {
                    required: true,
                    
                },
                 district: {
                    required: true,
                     
                },
                thana: {
                    required: true,
                    
                },
                confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                },
                iphone: {
                    required: true,

                },
                iaddress: {
                    required: true,
                         },
                phone: {
                    required: true,
                   
                },

                topic: {
                    required: "#newsletter:checked",
                    minlength: 2
                },
                
                inurl: {
                    required: true,
                    
                },
                agree: "required"
            },
            messages: {
                firstname: "Please enter your firstname",
                lastname: "Please enter your lastname",
                icode: {
                    required: "Please enter a Insiatute Code",                    
                },
                 division: {
                    required: "Choose Division",                    
                },
                district: {
                    required: "Choose District",                    
                },
                thana: {
                    required: "Choose Thana/Upazilla",                    
                },               
                 password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                confirm_password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Please enter the same password as above"
                },
                email: "Please enter a valid email",
                usiaddress: "Please enter a Local address",
                roll: "Please enter a roll no.",
                institute_name: "Please enter a valid Institute Name",
                iphone: "Please enter a Valid Phone Number",
                address: "Please enter a valid  address",
                inurl: "Please enter a valid Link: www.digitialaducation/Your_Academic_Name",
                guardian_name: "Please enter a guardian name",
                agree: "Please accept our policy"
            }
        });
         // validate signup form instituted add
        $("#signupinstute").validate({
            rules: {
                institute_name: "required",

                icode: {
                    required: true,
                    minlength: 10
                },
                password: {
                    required: true,
                    minlength: 5
                },                
                division: {
                    required: true,
                    
                },
                 district: {
                    required: true,
                     
                },
                thana: {
                    required: true,
                    
                },
                confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                },
                iphone: {
                    required: true,

                },
                iaddress: {
                    required: true,
                         },
                phone: {
                    required: true,
                   
                },

                topic: {
                    required: "#newsletter:checked",
                    minlength: 2
                },
                
                inurl: {
                    required: true,
                    
                },
                agree: "required"
            },
            messages: {
                firstname: "Please enter your firstname",
                lastname: "Please enter your lastname",
                icode: {
                    required: "Please enter a Insiatute Code",                    
                },
                 division: {
                    required: "Choose Division",                    
                },
                district: {
                    required: "Choose District",                    
                },
                thana: {
                    required: "Choose Thana/Upazilla",                    
                },               
                 password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                confirm_password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Please enter the same password as above"
                },
                email: "Please enter a valid email",
                usiaddress: "Please enter a Local address",
                roll: "Please enter a roll no.",
                institute_name: "Please enter a valid Institute Name",
                iphone: "Please enter a Valid Phone Number",
                address: "Please enter a valid  address",
                inurl: "Please enter a valid Link: www.digitialaducation/Your_Academic_Name",
                guardian_name: "Please enter a guardian name",
                agree: "Please accept our policy"
            }
        });
        // validate Update form on institute
        $("#instituteupdate").validate({
            rules: {
                gname: "required",

                username: {
                    required: true,
                    minlength: 4
                },
                password: {
                    required: true,
                    minlength: 5
                },
                confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                email: {
                    required: true,

                },
                father_name: {
                    required: true,

                },
                mother_name: {
                    required: true,

                },
                father_profession: {
                    required: true,

                },
                mother_profession: {
                    required: true,

                },
                religion: {
                    required: true,

                },
                address: {
                    required: true,

                },
                phone: {
                    required: true,

                },

                nid: {
                    required: true,

                },
                topic: {
                    required: "#newsletter:checked",
                    minlength: 2
                },
                agree: "required"
            },
            messages: {
                gname: "Please enter a Guardian Name",
                father_name: "Please enter students father name",
                mother_name: "Please enter students mother name",
                father_profession: "Please enter father profession",
                mother_profession: "Please enter mother profession",
                religion: "Please enter your religion",

                nid: "Please enter your Natinoal Id card Number",
                iusername: {
                    required: "Please enter a username",
                    minlength: "Your username must consist of at least 4 characters"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                confirm_password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Please enter the same password as above"
                },
                email: "Please enter a valid email",
                user_type: "Please enter a user type",

                address: "Please enter a valid  address",
                agree: "Please accept our policy"
            }
        });
         // validate Class Information Add
        $("#classinfo").validate({
            rules: {            
                teacherName: {
                    required: true,                     
                },
                className: {
                    required: true,                    
                },                
                classnumeric: {
                    required: true,
                    
                }
                  
            },
            messages: {
                teacherName: "Please Choose Teacher Name",
                className: "Please enter Class",
                classnumeric:"Please enter Numaric Class",
                 
                
            }
        });
        // validate Subject Information Add
        $("#subjectinfo").validate({
            rules: {
                subname: {
                    required: true,
                },
                subcode: {
                    required: true,
                },
                subteacher: {
                    required: true,
                },
                subclass: {
                    required: true,

                }

            },
            messages: {
                subname: "Please Enter a Subject Name",
                subcode: "Please Enter Subject Code",
                subteacher:"Please choose a Teacher",
                subclass:"Please enter choose a Class",

            }
        });
        // validate signup form on keyup and submit
        $("#signupTeacher").validate({
            rules: {
                firstname: "required",
                lastname: "required",
                username: {
                    required: true,
                    minlength: 4
                },
                password: {
                    required: true,
                    minlength: 5
                },
                confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                email: {
                    required: true,

                },
                designation: {
                    required: true,

                },
                dbirth: {
                    required: true,

                },
                gender: {
                    required: true,

                },
                image: {
                    required: true,

                },

                religion: {
                    required: true,

                },
                address: {
                    required: true,

                },
                phone: {
                    required: true,

                },

                nid: {
                    required: true,

                },
                join_date: {
                    required: true,

                },
                topic: {
                    required: "#newsletter:checked",
                    minlength: 2
                },
                agree: "required"
            },
            messages: {
                firstname: "Please enter your firstname",
                lastname: "Please enter your lastname",
                username: {
                    required: "Please enter a username",
                    minlength: "Your username must consist of at least 4 characters"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                confirm_password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Please enter the same password as above"
                },
                email: "Please enter a valid email",
                designation: "Please enter a designation",
                dbirth: "Please enter Dath of Birth",
                gender: "Please enter a gender",
                religion: "Please enter a religion",
                address: "Please enter a valid  address",
                join_date: "Please enter a joining date",
                phone: "Please enter a phone no.",
                nid: "Please enter National Id card No.",
                agree: "Please accept our policy"
            }
        });
        // validate signup form on keyup and submit
        $("#signupParents").validate({
            rules: {
                gname: "required",
                father_name: "required",
                mother_name: "required",
                username: {
                    required: true,
                    minlength: 4
                },
                password: {
                    required: true,
                    minlength: 5
                },
                confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                email: {
                    required: true,

                },
                father_profession: {
                    required: true,

                },
                mother_profession: {
                    required: true,

                },

                religion: {
                    required: true,

                },
                address: {
                    required: true,

                },
                phone: {
                    required: true,

                },
                nid: {
                    required: true,

                },
                topic: {
                    required: "#newsletter:checked",
                    minlength: 2
                },
                agree: "required"
            },
            messages: {
                gname: "Please enter a Guardian Name",
                father_name: "Please enter father's name",
                mother_name: "Please enter mother's name",
                username: {
                    required: "Please enter a username",
                    minlength: "Your username must consist of at least 4 characters"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                confirm_password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Please enter the same password as above"
                },
                email: "Please enter a valid email",
                father_profession: "Please enter father's profession",
                mother_profession: "Please enter mother's profession",
                religion: "Please enter a religion",
                address: "Please enter a valid  address",
                phone: "Please enter a phone no.",
                nid: "Please enter National Id card No.",
                agree: "Please accept our policy"
            }
        });
        // propose username by combining first- and lastname
        $("#username").focus(function() {
            var firstname = $("#firstname").val();
            var lastname = $("#lastname").val();
            if(firstname && lastname && !this.value) {
                this.value = firstname + "." + lastname;
            }
        });

        //code to hide topic selection, disable for demo
        var newsletter = $("#newsletter");
        // newsletter topics are optional, hide at first
        var inital = newsletter.is(":checked");
        var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
        var topicInputs = topics.find("input").attr("disabled", !inital);
        // show when newsletter is checked
        newsletter.click(function() {
            topics[this.checked ? "removeClass" : "addClass"]("gray");
            topicInputs.attr("disabled", !this.checked);
        });
    });


}();