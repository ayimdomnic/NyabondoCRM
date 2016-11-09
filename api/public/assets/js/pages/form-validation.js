$(document).ready(function() {
    // Generate a simple captcha
    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    };
    $('#captchaOperation').html([randomNumber(1, 20), '+', randomNumber(1, 30), '='].join(' '));
	
	
	//Validation of School registration form
    $('#myWizard').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
            school_code: {
                validators: {
                    notEmpty: {
                        message: 'The school code is required and can\'t be empty'
                    }
                }
            },
            email: {
                validators: {
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            },
            school_name: {
                validators: {
                    notEmpty: {
                        message: 'The school name is required and can\'t be empty'
                    }
                }
            },
            registered: {
                validators: {
                    notEmpty: {
                        message: 'The registered is required and can\'t be empty'
                    }
                }
            },
            start_date: {
                validators: {
                    notEmpty: {
                        message: 'The school start date is required and can\'t be empty'
                    },
                    digits: {
                        message: 'The value can contain only digits'
                    }

                }
            },
            owner: {
                validators: {
                    notEmpty: {
                        message: 'The owner is required and can\'t be empty'
                    }
                }
            },
            ownership_type: {
                validators: {
                    notEmpty: {
                        message: 'The ownership type is required and can\'t be empty'
                    }
                }
            },
            school_head: {
                validators: {
                    notEmpty: {
                        message: 'The school head/Principal is required and can\'t be empty'
                    }
                }
            },
            mobile: {
                validators: {
                    digits: {
                        message: 'The value can contain only digits'
                    }
                }
            },
            fax: {
                validators: {
                    digits: {
                        message: 'The value can contain only digits'
                    }
                }
            },
            telephone: {
                validators: {
                    digits: {
                        message: 'The value can contain only digits'
                    }
                }
            }
        }
    });

    //Schools departments
    $('#department').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
            dept_name: {
                message: 'The Department Name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Department name is required and can\'t be empty'
                    }
                }
            },
            status: {
                message: 'The status is not valid',
                validators: {
                    notEmpty: {
                        message: 'The status is required and can\'t be empty'
                    }
                }
            }
        },
        submitHandler: function(form) {
            $("#output").html("<h3><span class='text-info'><i class='fa fa-spinner fa-spin'></i> Making changes please wait...</span><h3>");
            var postData = $('#department').serializeArray();
            var formURL = $('#department').attr("action");
            var lname= $('#listLevels').attr("name");
            $.ajax(
                {
                    url : formURL,
                    type: "POST",
                    data : postData,
                    success:function(data)
                    {
                        console.log(data);
                        //data: return data from server
                        $("#output").html(data);
                        setTimeout(function() {
                            $("#output").html("");
                            $("#listLevels").load(lname);
                            $("#myModal").modal("hide");
                        }, 2000);

                    },
                    error: function(data)
                    {
                        console.log(data.responseJSON);
                        //in the responseJSON you get the form validation back.
                        $("#output").html("<h3><span class='text-info'> Error in processing data try again...</span><h3>");
                        setTimeout(function() {
                            $("#output").html(data);
                        }, 2000);

                    }
                });
        }

    });
  //Education levels
    $('#eduLevels').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
            level_name: {
                message: 'The level name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The level name is required and can\'t be empty'
                    }
                }
            },
            school_id: {
            message: 'The school is not valid',
                validators: {
                notEmpty: {
                    message: 'The school is required and can\'t be empty'
                }
            }
        },
            status: {
                message: 'The status is not valid',
                validators: {
                    notEmpty: {
                        message: 'The status is required and can\'t be empty'
                    }
                }
            }
        },
        submitHandler: function(form) {
            $("#output").html("<h3><span class='text-info'><i class='fa fa-spinner fa-spin'></i> Making changes please wait...</span><h3>");
            var postData = $('#eduLevels').serializeArray();
            var formURL = $('#eduLevels').attr("action");
            var lname= $('#listLevels').attr("name");
            $.ajax(
                {
                    url : formURL,
                    type: "POST",
                    data : postData,
                    success:function(data)
                    {
                        console.log(data);
                        //data: return data from server
                        $("#output").html(data);
                        setTimeout(function() {
                            $("#output").html("");
                            $("#listLevels").load(lname);
                            $("#myModal").modal("hide");
                        }, 2000);

                    },
                    error: function(data)
                    {
                        console.log(data.responseJSON);
                        //in the responseJSON you get the form validation back.
                        $("#output").html("<h3><span class='text-info'> Error in processing data try again...</span><h3>");
                        setTimeout(function() {
                            $("#output").html(data);
                        }, 2000);

                    }
                });
        }

    });
    $('#eduLevelsm').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
            level_name: {
                message: 'The level name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The level name is required and can\'t be empty'
                    }
                }
            },
            school_id: {
                message: 'The school is not valid',
                validators: {
                    notEmpty: {
                        message: 'The school is required and can\'t be empty'
                    }
                }
            },
            status: {
                message: 'The status is not valid',
                validators: {
                    notEmpty: {
                        message: 'The status is required and can\'t be empty'
                    }
                }
            }
        },
        submitHandler: function(form) {
            $("#output").html("<h3><span class='text-info'><i class='fa fa-spinner fa-spin'></i> Making changes please wait...</span><h3>");
            var postData = $('#eduLevelsm').serializeArray();
            var formURL = $('#eduLevelsm').attr("action");
            var lname= $('#listLevelsm').attr("name");
            $.ajax(
                {
                    url : formURL,
                    type: "POST",
                    data : postData,
                    success:function(data)
                    {
                        console.log(data);
                        //data: return data from server
                        $("#output").html(data);
                        setTimeout(function() {
                            $("#output").html("");
                            $("#listLevels").load(lname);
                            $("#myModal").modal("hide");
                        }, 2000);

                    },
                    error: function(data)
                    {
                        console.log(data.responseJSON);
                        //in the responseJSON you get the form validation back.
                        $("#output").html("<h3><span class='text-info'> Error in processing data try again...</span><h3>");
                        setTimeout(function() {
                            $("#output").html(data);
                        }, 2000);

                    }
                });
        }

    });

    $('#classLevels').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
            level_id: {
                message: 'The level name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The level name is required and can\'t be empty'
                    }
                }
            },
            class_name: {
                message: 'The Class name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Class name is required and can\'t be empty'
                    }
                }
            },
            school_id: {
                message: 'The school is not valid',
                validators: {
                    notEmpty: {
                        message: 'The school is required and can\'t be empty'
                    }
                }
            },
            status: {
                message: 'The status is not valid',
                validators: {
                    notEmpty: {
                        message: 'The status is required and can\'t be empty'
                    }
                }
            }
        },
        submitHandler: function(form) {
            $("#output").html("<h3><span class='text-info'><i class='fa fa-spinner fa-spin'></i> Making changes please wait...</span><h3>");
            var postData = $('#classLevels').serializeArray();
            var formURL = $('#classLevels').attr("action");
            var lname= $('#listLevels').attr("name");
            $.ajax(
                {
                    url : formURL,
                    type: "POST",
                    data : postData,
                    success:function(data)
                    {
                        console.log(data);
                        //data: return data from server
                        $("#output").html(data);
                        setTimeout(function() {
                            $("#output").html("");
                            $("#listClasses").load(lname);
                            $("#myModal").modal("hide");
                        }, 2000);

                    },
                    error: function(data)
                    {
                        console.log(data.responseJSON);
                        //in the responseJSON you get the form validation back.
                        $("#output").html("<h3><span class='text-info'> Error in processing data try again...</span><h3>");
                        setTimeout(function() {
                            $("#output").html(data);
                        }, 2000);

                    }
                });
        }

    });
    $('#eLevelClasses').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
            class_name: {
                message: 'The level name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Class name is required and can\'t be empty'
                    }
                }
            },
            status: {
                message: 'The status is not valid',
                validators: {
                    notEmpty: {
                        message: 'The status is required and can\'t be empty'
                    }
                }
            }
        },
        submitHandler: function(form) {
            $("#output").html("<h3><span class='text-info'><i class='fa fa-spinner fa-spin'></i> Making changes please wait...</span><h3>");
            var postData = $('#eLevelClasses').serializeArray();
            var formURL = $('#eLevelClasses').attr("action");
            $.ajax(
                {
                    url : formURL,
                    type: "POST",
                    data : postData,
                    success:function(data)
                    {
                        console.log(data);
                        //data: return data from server
                        setTimeout(function() {
                            $("#output").html(data);
                            $("#myModal").modal("hide");
                        }, 2000);

                    },
                    error: function(data)
                    {
                        console.log(data.responseJSON);
                        //in the responseJSON you get the form validation back.
                        $("#output").html("<h3><span class='text-info'> Error in processing data try again...</span><h3>");
                        setTimeout(function() {
                            $("#output").html(data);
                            $("#myModal").modal("hide");
                        }, 2000);

                    }
                });
        }

    });

    ///Examination Validations
    $('#examsCreate').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
            level_id: {
                message: 'The Education Level name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Education Level  is required and can\'t be empty'
                    }
                }
            },
            ExamCode: {
                message: 'The ExamCode is not valid',
                validators: {
                    notEmpty: {
                        message: 'The ExamCode  is required and can\'t be empty'
                    }
                }
            },
            Exam_Name: {
                message: 'The Exam_Name name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Exam_Name  is required and can\'t be empty'
                    }
                }
            },
            status: {
                message: 'The status is not valid',
                validators: {
                    notEmpty: {
                        message: 'The status is required and can\'t be empty'
                    }
                }
            }
        },
        submitHandler: function(form) {
            $("#output").html("<h3><span class='text-info'><i class='fa fa-spinner fa-spin'></i> Making changes please wait...</span><h3>");
            var postData = $('#examsCreate').serializeArray();
            var formURL = $('#examsCreate').attr("action");
            $.ajax(
                {
                    url : formURL,
                    type: "POST",
                    data : postData,
                    success:function(data)
                    {
                        console.log(data);
                        //data: return data from server
                        setTimeout(function() {
                            $("#output").html(data);
                            $("#myModal").modal("hide");
                        }, 2000);

                    },
                    error: function(data)
                    {
                        console.log(data.responseJSON);
                        //in the responseJSON you get the form validation back.
                        $("#output").html("<h3><span class='text-info'> Error in processing data try again...</span><h3>");
                        setTimeout(function() {
                            $("#output").html(data);
                            $("#myModal").modal("hide");
                        }, 2000);

                    }
                });
        }

    });

    $('#classLevelsm').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
            level_name: {
                message: 'The level name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The level name is required and can\'t be empty'
                    }
                }
            },
            school_id: {
                message: 'The school is not valid',
                validators: {
                    notEmpty: {
                        message: 'The school is required and can\'t be empty'
                    }
                }
            },
            status: {
                message: 'The status is not valid',
                validators: {
                    notEmpty: {
                        message: 'The status is required and can\'t be empty'
                    }
                }
            }
        },
        submitHandler: function(form) {
            $("#output").html("<h3><span class='text-info'><i class='fa fa-spinner fa-spin'></i> Making changes please wait...</span><h3>");
            var postData = $('#classLevelsm').serializeArray();
            var formURL = $('#classLevelsm').attr("action");
            var lname= $('#listLevelsm').attr("name");
            $.ajax(
                {
                    url : formURL,
                    type: "POST",
                    data : postData,
                    success:function(data)
                    {
                        console.log(data);
                        //data: return data from server
                        $("#output").html(data);
                        setTimeout(function() {
                            $("#output").html("");
                            $("#listClasses").load(lname);
                            $("#myModal").modal("hide");
                        }, 2000);

                    },
                    error: function(data)
                    {
                        console.log(data.responseJSON);
                        //in the responseJSON you get the form validation back.
                        $("#output").html("<h3><span class='text-info'> Error in processing data try again...</span><h3>");
                        setTimeout(function() {
                            $("#output").html(data);
                        }, 2000);

                    }
                });
        }

    });

    //Grade form verifications  classLevelsGrade
    $('#eduLevelsGrade').bootstrapValidator({
        fields: {
            level_id: {
                message: 'The Education level is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Education level is required and can\'t be empty'
                    }
                }
            },
            grade_name: {
                message: 'The grade name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The grade name is required and can\'t be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 3,
                        message: 'The field can have maximum 3 characters long'
                    }
                }
            },
            grade_from: {
                message: 'The grade from is not valid',
                validators: {
                    notEmpty: {
                        message: 'The grade from is required and can\'t be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 3,
                        message: 'The field can have maximum 3 characters long'
                    },
                    digits: {
                        message: 'The value can contain only digits'
                    }

                }
            },
            grade_to: {
                message: 'The grade_to is not valid',
                validators: {
                    notEmpty: {
                        message: 'The grade_to is required and can\'t be empty'
                    },
                    stringLength: {
                        min: 1,
                        max: 3,
                        message: 'The field can have maximum 3 characters long'
                    },
                    digits: {
                        message: 'The value can contain only digits'
                    }
                }
            },
            status: {
                message: 'The status is not valid',
                validators: {
                    notEmpty: {
                        message: 'The status is required and can\'t be empty'
                    }
                }
            }
        },
        submitHandler: function(form) {
            $("#output").html("<h3><span class='text-info'><i class='fa fa-spinner fa-spin'></i> Making changes please wait...</span><h3>");
            var postData = $('#eduLevelsGrade').serializeArray();
            var formURL = $('#eduLevelsGrade').attr("action");
            var lname= $('#grades').attr("name");
            $.ajax(
                {
                    url : formURL,
                    type: "POST",
                    data : postData,
                    success:function(data)
                    {
                        console.log(data);
                        //data: return data from server
                        $("#output").html(data);
                        $("#grades").load(lname);
                        setTimeout(function() {
                            $("#output").html("");
                            $("#myModal").modal("hide");
                        }, 2000);

                    },
                    error: function(data)
                    {
                        console.log(data.responseJSON);
                        //in the responseJSON you get the form validation back.
                        $("#output").html("<h3><span class='text-info'> Error in processing data try again...</span><h3>");
                        setTimeout(function() {
                            $("#output").html(data);
                            $("#grades").load(lname);
                        }, 2000);

                    }
                });
        }

    });

    $('#formacyear').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
            school: {
                validators: {
                    notEmpty: {
                        message: 'The school is required and can\'t be empty'
                    }
                }
            },
            current_year: {
                validators: {
                    notEmpty: {
                        message: 'The Year is required and can\'t be empty'
                    },
                    regexp: {
                        regexp: /^[0-9_\.]+$/,
                        message: 'The Year can only consist of number'
                    }

                }
            },
            startdate: {
                validators: {
                    notEmpty: {
                        message: 'The start date is required and can\'t be empty'
                    }

                }
            },
            enddate: {
                validators: {
                    notEmpty: {
                        message: 'The end date is required and can\'t be empty'
                    }

                }
            }
        },
        submitHandler: function(form) {
            $("#output").html("<h3><span class='text-info'><i class='fa fa-spinner fa-spin'></i> Making changes please wait...</span><h3>");
            var postData = $('#formacyear').serializeArray();
            var formURL = $('#formacyear').attr("action");
            $.ajax(
                {
                    url : formURL,
                    type: "POST",
                    data : postData,
                    success:function(data)
                    {
                        console.log(data);
                        //data: return data from server
                        $("#output").html(data);
                        setTimeout(function() {
                            $("#output").html("");
                        }, 2000);

                    },
                    error: function(data)
                    {
                        console.log(data.responseJSON);
                        //in the responseJSON you get the form validation back.
                        $("#output").html("<h3><span class='text-info'> Error in processing data try again...</span><h3>");
                        setTimeout(function() {
                            $("#output").html(data);
                        }, 2000);

                    }
                });
        }

    });
   //USER REGISTER FORM
    $('#schoolUserRegistration').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
            username: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required and can\'t be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The username must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    },
                    different: {
                        field: 'password',
                        message: 'The username and password can\'t be the same as each other'
                    }
                }
            },
            other_name: {
                message: 'The username is not valid',
                validators: {
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The Other Name can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            surname: {
                message: 'The Surname is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Surname is required and can\'t be empty'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The Surname can only consist of alphabetical, number, dot and underscore'
                    }

                }
            },
            first_name: {
                message: 'The First Name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The First Name is required and can\'t be empty'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The First Name can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required and can\'t be empty'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and can\'t be empty'
                    },
                    identical: {
                        field: 'confirmPassword',
                        message: 'The password and its confirm are not the same'
                    }
                }
            },
            confirmPassword: {
                validators: {
                    notEmpty: {
                        message: 'The confirm password is required and can\'t be empty'
                    },
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    },
                    different: {
                        field: 'username',
                        message: 'The password can\'t be the same as username'
                    }
                }
            },
            phone: {
                validators: {
                    digits: {
                        message: 'The value can contain only digits'
                    }
                }
            }
        },
        submitHandler: function(form) {
            $("#output").html("<h3><span class='text-info'><i class='fa fa-spinner fa-spin'></i> Making changes please wait...</span><h3>");
            var postData = $('#schoolUserRegistration').serializeArray();
            var formURL = $('#schoolUserRegistration').attr("action");
            $.ajax(
                {
                    url : formURL,
                    type: "POST",
                    data : postData,
                    success:function(data)
                    {
                        console.log(data);
                        //data: return data from server
                        $("#display").html(data);
                        $("#output").html('');
                    },
                    error: function(data)
                    {
                        console.log(data.responseJSON);
                        //in the responseJSON you get the form validation back.
                        $("#output").html("<h3><span class='text-info'> Error in processing data try again...</span><h3>");
                        $("#display").html(data);

                    }
                });
        }

    });
    //User general
    $('#UserRegistration').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
            username: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required and can\'t be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The username must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    },
                    different: {
                        field: 'password',
                        message: 'The username and password can\'t be the same as each other'
                    }
                }
            },
            other_name: {
                message: 'The username is not valid',
                validators: {
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The Other Name can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            school: {
                message: 'The School is not valid',
                validators: {
                    notEmpty: {
                        message: 'The school is required and can\'t be empty'
                    }
                }
            },
            surname: {
                message: 'The Surname is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Surname is required and can\'t be empty'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The Surname can only consist of alphabetical, number, dot and underscore'
                    }

                }
            },
            first_name: {
                message: 'The First Name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The First Name is required and can\'t be empty'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The First Name can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required and can\'t be empty'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and can\'t be empty'
                    },
                    stringLength: {
                        min: 8,
                        max: 50,
                        message: 'The username must be more than 6 and less than 30 characters long'
                    },
                    identical: {
                        field: 'confirmPassword',
                        message: 'The password and its confirm are not the same'
                    }
                }
            },
            confirmPassword: {
                validators: {
                    notEmpty: {
                        message: 'The confirm password is required and can\'t be empty'
                    },
                    stringLength: {
                        min: 8,
                        max: 50,
                        message: 'The username must be more than 6 and less than 30 characters long'
                    },
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    },
                    different: {
                        field: 'username',
                        message: 'The password can\'t be the same as username'
                    }
                }
            },

            phone: {
                validators: {
                    digits: {
                        message: 'The value can contain only digits'
                    }
                }
            }
        },
        submitHandler: function(form) {
            $("#output").html("<h3><span class='text-info'><i class='fa fa-spinner fa-spin'></i> Making changes please wait...</span><h3>");
            var postData = $('#UserRegistration').serializeArray();
            var formURL = $('#UserRegistration').attr("action");
            $.ajax(
                {
                    url : formURL,
                    type: "POST",
                    data : postData,
                    success:function(data)
                    {
                        console.log(data);
                        //data: return data from server

                        $("#output").html('data');
                        setTimeout(function() {
                            $("#myModal").modal("hide");
                        }, 2000);
                    },
                    error: function(data)
                    {
                        console.log(data);
                        //in the responseJSON you get the form validation back.
                        $("#output").html("<h3><span class='text-info'> Error in processing data try again...</span><h3>");

                    }
                });
        }

    });
    //Login
    $('#loginForm').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
            username: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required and can\'t be empty'
                    },

                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },

            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and can\'t be empty'
                    }
                }
            }

            }
    });

	//EXAMPLE CONTACT FORM
    $('#contactForm').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
            name: {
                message: 'Name is not valid',
                validators: {
                    notEmpty: {
                        message: 'Name is required and can\'t be empty'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'Name can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required and can\'t be empty'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            },
            website: {
                validators: {
                    uri: {
                        message: 'The input is not a valid URL'
                    }
                }
            },
            Contactmessage: {
                validators: {
                    notEmpty: {
                        message: 'Message is required and can\'t be empty'
                    },
                    stringLength: {
                        min: 6,
                        message: 'Message must be more than 6 characters long'
                    }
                }
            },
            captcha: {
                validators: {
                    callback: {
                        message: 'Wrong answer',
                        callback: function(value, validator) {
                            var items = $('#captchaOperation').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
                            return value == sum;
                        }
                    }
                }
            }
        }
    });
	
	
	//Regular expression based validators
    $('#ExpressionValidator').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
             email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required and can\'t be empty'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            },
            website: {
                validators: {
                    uri: {
                        message: 'The input is not a valid URL'
                    }
                }
            },
            phoneNumber: {
                validators: {
                    digits: {
                        message: 'The value can contain only digits'
                    }
                }
            },
            color: {
                validators: {
                    hexColor: {
                        message: 'The input is not a valid hex color'
                    }
                }
            },
            zipCode: {
                validators: {
                    usZipCode: {
                        message: 'The input is not a valid US zip code'
                    }
                }
            }
        }
    });
	
	
	//Regular expression based validators
    $('#NotEmptyValidator').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
            username: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required and can\'t be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The username must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    }
                }
            },
            country: {
                validators: {
                    notEmpty: {
                        message: 'The country is required and can\'t be empty'
                    }
                }
            }
        }
    });
	
	
	//Regular expression based validators
    $('#IdenticalValidator').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and can\'t be empty'
                    },
                    identical: {
                        field: 'confirmPassword',
                        message: 'The password and its confirm are not the same'
                    }
                }
            },
            confirmPassword: {
                validators: {
                    notEmpty: {
                        message: 'The confirm password is required and can\'t be empty'
                    },
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    }
                }
            }
        }
    });
	
	//Regular expression based validators
    $('#OtherValidator').bootstrapValidator({
        message: 'This value is not valid',
        fields: {
            ages: {
                validators: {
                    lessThan: {
                        value: 100,
                        inclusive: true,
                        message: 'The ages has to be less than 100'
                    },
                    greaterThan: {
                        value: 10,
                        inclusive: false,
                        message: 'The ages has to be greater than or equals to 10'
                    }
                }
            }
        }
    });
	
});