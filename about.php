<?php
$title = "About";
include('include/header.php');

?>
<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <h1 class=" text-green mb-3">About Camera Shop</h1>
            <p class="text-secondary " style="text-align: justify; ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa ducimus exercitationem vero magnam voluptates laboriosam officiis voluptatum aut, modi numquam, sed nobis autem architecto ex inventore tempora, possimus quisquam delectus maiores iure voluptas. Voluptates, quo! Officiis ipsa ipsum assumenda quidem similique unde est repudiandae, dolores alias impedit qui magni voluptates cumque eligendi iure dolorum necessitatibus esse facilis tempore blanditiis maxime tenetur deserunt non ut? Natus dolores iusto odit voluptate hic quam voluptates quas! Accusamus, qui labore officia nesciunt eius culpa esse at illo accusantium sapiente aspernatur sit repellat nostrum repudiandae aut obcaecati delectus iste quaerat nemo quae recusandae error ea.</p>
            <a class="btn btn-outline-success" href="#offer-container">Know more...</a>
        </div>
    </div>
</div>
<div class="container-fluid" id="offer-container">

    <div class="container offers my-5 py-3">
        <div class="row d-flex justify-content-around">
            <div class="col-lg-3 col-md-3 col-sm-7 col-7 p-2">
                <div class="rounded-circle offerDiv d-flex p-2 justify-content-center align-items-center flex-column">
                    <i class="fa fa-4x fa-dollar-sign mb-2"></i>
                    <h4 class="text-green my-2">MONEY BACK</h4>
                    <p class="text-secondary text-center">30 days money back guarantee</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-7 col-7 p-2">
                <div class="rounded-circle offerDiv d-flex p-2 justify-content-center align-items-center flex-column">
                    <i class="fa fa-4x fa-truck mb-2"></i>
                    <h4 class="text-green my-2">FREE SHIPPING</h4>
                    <p class="text-secondary text-center">FREE SHIP-ON ALL CAMERAS</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-7 col-7 p-2">
                <div class="rounded-circle offerDiv d-flex p-2 justify-content-center align-items-center flex-column">
                    <i class="fa fa-4x fa-gift mb-2"></i>
                    <h4 class="text-green my-2">SPECIAL SALE</h4>
                    <p class="text-secondary text-center">BEST DEALS FOR CAMERAS</p>
                </div>
            </div>
        </div>
    </div>

</div>
<?php
include("our-brands.php");
include('include/footer.php');
?>