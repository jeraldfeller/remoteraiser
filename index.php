<?php
require 'Model/Init.php';
require 'Model/Model.php';
$model = new Model();
if(isset($_POST['submit'])){
    $model->addContactLog($_POST);
}
include 'Includes/header.php';

?>
<!-- Modal -->
<div id="successModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="modalStatus">Success</h4>
            </div>
            <div class="modal-body" id="modalBody">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<?php
if(isset($_GET['success'])){
    if($_GET['success'] == 'true'){
        echo '<script>
                $(".modal-header").removeClass("bg-danger");
                $("#modalStatus").html("Success");
                $("#modalBody").html("<p>Thank you for your inquiry, we will be in touch soon!</p>");
                $("#successModal").modal("show");
                setTimeout(function(){
                    $("#successModal").modal("hide");
                }, 2000)
             </script>';
    }else{
        echo '<script>
                $(".modal-header").addClass("bg-danger");
                $("#modalStatus").html("Ooppss! Something went wrong!!");
                $("#modalBody").html("<p>Please try to send again, if the problem persist, are contact information is at the bottom of this page</p>");
                $("#successModal").modal("show");
                setTimeout(function(){
                    $("#successModal").modal("hide");
                    $formOffset = $("#form").offset().top;
                    $("html, body").animate({ scrollTop: $formOffset - 90}, 600);
                        }, 2000)
             </script>';
    }
}
?>
<!-- Page Content -->
<div class="container">

    <div class="row">
        <div class="col-sm-12">
            <p>
                <a class="btn btn-primary btn-lg" href="#" id="startToday">Start Today   >></a>
            </p>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-sm-4 my-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <img class="card-img-top img-responsive" src="assets/images/left-graphic.png" alt="">
                    <div class="card-block">
                        <h4 class="card-title">This is easy...</h4>
                        <p class="card-text">Let's make a difference together today. We will grow the financial resources for your cause. You will help create jobs for those who need a "leg up" in life, by processing the materials you collect. All while making our planet a better place to live.</p>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-sm-4 my-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <img class="img-responsive" src="assets/images/center-graphic.png"  alt="">
                    <div class="card-block">
                        <h4 class="card-title">Our Impact</h4>
                        <img class="img-responsive" src="assets/images/progress.JPG" alt="">
                    </div>

                </div>
            </div>
        </div>
        <div class="col-sm-4 my-4">
            <div class="panel panel-default">
                <div class="panel-body">
                <img class="card-img-top img-responsive" src="assets/images/right-graphic.png" alt="">
                <div class="card-block">
                    <h4 class="card-title">Together we can...</h4>
                    <p class="card-text">This is Easy! Fill out the contact information below. We will take a look at your group, and how we can best help you. We will then provide you with advertising products to help with newsletters, Facebook posts etc. You start collecting remotes! We pick them up, assess the marketable quantity, and pay you.</p>
                </div>

                </div>
            </div>
        </div>

    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Contact Us Today!</h4>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="index.php" method="post" id="form">
                        <div class="form-group">
                            <label for="email" class="col-lg-2 control-label">Email</label>
                            <div class="col-lg-10">
                                <input type="email" class="form-control" id="email" name="email" placeholder="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone_no" class="col-lg-2 control-label">Phone #</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="phone_no" name="phone_no" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="contact_person" class="col-lg-2 control-label">Contact Person</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="contact_person" name="contact_person" placeholder="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="organization" class="col-lg-2 control-label">Organization</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="organization" name="organization" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="city" class="col-lg-2 control-label">City</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="city" name="city" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="state" class="col-lg-2 control-label">State</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="state" name="state" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="group_size" class="col-lg-2 control-label">Group Size</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="group_size" name="group_size" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="comments" class="col-lg-2 control-label pull-left">Comments</label>
                            <div class="col-lg-10">
                                <textarea class="form-control" id="comments" name="comments" rows="5"></textarea>
                            </div>
                        </div>
                </div>
                <div class="panel-footer align-right">
                    <input type="submit" name="submit" class="btn btn-success" value="Send">
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <h2 class="mt-4">Contact Us</h2>
            <address>
                <strong>remoteraiser.com</strong>
                <br>5440 Jullietta Place
                <br>Lincoln, CA 95648
                <br><b>Call us at 916-235-3850</b>
            </address>
        </div>
    </div>

</div>
<!-- /.container -->

<?php
include 'Includes/footer.php';
?>

<script type="text/javascript">
    $(document).ready(function(){
        $('#form').submit(function() {
            if ($.trim($("#email").val()) === "" || $.trim($("#contact_person").val()) === "") {

                alert('Please input required fields.');
                if($.trim($("#email").val()) === ""){
                    $("#email").focus();
                }else{
                    $("#contact_person").focus();
                }
                return false;
            }
        });


        $('#startToday').click(function(){

            $formOffset = $('#form').offset().top;
            $('html, body').animate({ scrollTop: $formOffset - 90}, 600);

        });

    });

</script>