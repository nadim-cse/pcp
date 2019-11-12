<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Project Proposal Wizard</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="<?php echo site_url();?>assets/proposal/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo site_url();?>assets/proposal/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo site_url();?>assets/proposal/css/form-elements.css">
        <link rel="stylesheet" href="<?php echo site_url();?>assets/proposal/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <!-- <link rel="shortcut icon" href="<?php echo site_url();?>assets/proposal/ico/favicon.png"> -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo site_url();?>assets/proposal/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo site_url();?>assets/proposal/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo site_url();?>assets/proposal/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo site_url();?>assets/proposal/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 form-box">
                        <?php echo form_open('Proposal/CheckEmail', array('class' => 'email-submit-form f1', 'role' => 'form')); ?>
                         <fieldset>
                            <div id="field">
                                 <div id="field0">
                                <div class="form-group">
                                    <label class="sr-only" for="memberEmail">Email</label>
                                    <input type="text" name="emails[]" placeholder="Enter Email Address" class="form-control" id="memberEmail">
                                </div>
                                <div class="result"></div>
                                <!-- <div style="color:red;"><?php if($this->session->flashdata('success')){echo $this->session->flashdata('success');} ?></div> -->
                                
                                <div class="IDError"></div>
                                </div>
                                </div>
                                <div class="form-group">
                                    <button id="add-more" type="button" class="btn btn-warning" >Add More</button>
                               
                            </div>
                            
                            <br>
                                <div class="f1-buttons">
                                    <input type="submit" class="btn btn-success" value="Check">
                                </div>
                                
                        <?php echo form_close(); ?>        
                            </fieldset>
                            <h2>Result</h2>
                            <div style="color:red;"><?php if($this->session->flashdata('success')){echo $this->session->flashdata('success');} ?></div>
                            <div class="results"></div>
                            <div class="SubmitBtn"></div>
                            <div class="proposalBtn"></div>
                          <?php echo form_open('Proposal/Submit'); ?>
                                <input type="hidden" value="" name="fetchedemails">
                                <div class="sbtn"></div>
                                <div class="scbtn"></div>
                          <?php echo form_close(); ?>
                    	
                    </div>
                </div>
            </div>
        </div>


        <!-- Javascript -->
        <script src="<?php echo site_url();?>assets/proposal/js/jquery-1.11.1.min.js"></script>
        <script src="<?php echo site_url();?>assets/proposal/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo site_url();?>assets/proposal/js/jquery.backstretch.min.js"></script>
        <script src="<?php echo site_url();?>assets/proposal/js/retina-1.1.0.min.js"></script>
        <script src="<?php echo site_url();?>assets/proposal/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->
        <!--Add and Remove child-->
        <script type="text/javascript">
                $(document).ready(function () {
                //@naresh action dynamic childs
                var next = 0;
                $("#add-more").click(function(e){
                    e.preventDefault();
                    var addto = "#field" + next;
                    var addRemove = "#field" + (next);
                    next = next + 1;
                    if(next < 4){
                   
                    var newIn = '<br><div id="field'+ next +'"><div class="form-group"> <label class="sr-only" for="f1-twitter">Email</label> <input type="text" name="emails[]" placeholder="Enter Email Address" class="f1-twitter form-control" id="f1-twitter"> </div><div class="IDError"></div>';
                    var newInput = $(newIn);
                    var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >Remove</button></div></div><div id="field">';
                    var removeButton = $(removeBtn);
                    $(addto).after(newInput);
                    $(addRemove).after(removeButton);
                    $("#field" + next).attr('data-source',$(addto).attr('data-source'));
                    $("#count").val(next);  
                    
                        $('.remove-me').click(function(e){
                            e.preventDefault();
                            var fieldNum = this.id.charAt(this.id.length-1);
                            var fieldID = "#field" + fieldNum;
                            $(this).remove();
                            next = next - 1;
                            console.log(next);
                            $(fieldID).remove();
                        }); 
                    }else{
                        return alert('You can add only 1 member(s)');
                    }
                    
                });

            });
    </script>  
    <script>
       
        $('form.email-submit-form').on('submit', function(form){
			
				form.preventDefault();
			
				var URL = '<?php echo base_url();?>Proposal/CheckEmail';
			
				$.post(URL , $('form.email-submit-form').serialize(), function(data){

                    if(data != ''){
                        //console.log(data);
                        $('.results').html('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> These emails is not registered to our server:- \n'+data+'</div>');


                        
                        //var emails = $('input[name="emails[]"').val();
                        var values = $("input[name='emails[]']").map(function(){return $(this).val();}).get();
                        console.log(values);
                        var myJSON = JSON.stringify(values);
                       
                        
                       $("input[name=fetchedemails]").val(myJSON);
                     
                        console.log(values);
                       
                        
                    }else{
                        console.log('Matched');
                        var values = $("input[name='emails[]']").map(function(){return $(this).val();}).get();
                        console.log(values);
                        var myJSON = JSON.stringify(values);
                       
                        $("input[name=fetchedemails]").val(myJSON);
                        $('.sbtn').html('<input type="submit" class="btn btn-warning" value="Continue to porposal page">');
                       
                        
                    }

               
				
				
			})
		});

        function GetValuesAndRedirect(values){

            
            window.location.href = "<?php echo site_url()?>"+'Proposal/Hello/'+escape(values);
        }
    </script>

    </body>

</html>