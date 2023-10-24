<?php include "./partial/menu.php"; ?>

<div class="container">
    <div class="row py-5">
        <div class="col-md-6">
            <h2>Contact Us</h2>
            <form action="" class="form-control">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" name="username" placeholder="E.g. Hamza Nawabi">
                <label for="name" class="form-label">Your Phone:</label>
                <input type="text" class="form-control" name="phone" placeholder="E.g. +93766...">
                <label for="name" class="form-label">Your Email:</label>
                <input type="text" class="form-control" name="email" placeholder="E.g. hamza.nawabi119@gmail.com">
                <label for="name" class="form-label">Name:</label>
                <textarea id="" rows="8" class="form-control" name="message" placeholder="E.g. your message..."></textarea>
                <button class="btn-primary py-1 px-4 my-3 border-none form-control">Send</button>
            </form>
        </div>
        <div class="col-md-6">
            <h2>Our Location</h2>
            <h2>map</h2>
        </div>
    </div>
</div>


<?php include "./partial/footer.php"; ?>