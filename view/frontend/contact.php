<div>
<section class="mb-4 container">
    <h2 class="h1-responsive font-weight-bold text-center my-4">Contactez moi</h2>
    <p class="text-center w-responsive mx-auto mb-5">
        Vous avez une question ? Vous souhaitez que l'on collabore ensemble ?
        N'hésitez pas, je reviendrais vers vous dans les heures qui suivent.
    </p>
    <p><?php if(isset($_SESSION['message'])) { print $_SESSION['message']; unset($_SESSION['message']);} ?></p>
    <div class="row container-fluid">
        <div class="col-md-12 mb-md-0 mb-5">
            <form id="contact-form" name="contact-form" action="/?action=sendMail" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="name" name="name" class="form-control" required>
                            <label for="name" class="">Votre nom</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="email" name="email" class="form-control" required>
                            <label for="email" class="">Votre email</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <input type="text" id="subject" name="subject" class="form-control" required>
                            <label for="subject" class="">Sujet</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">

                        <div class="md-form">
                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"
                            required></textarea>
                            <label for="message">Votre message</label>
                        </div>
                    </div>
                </div>
                <div class="text-center text-md-left">
                    <a class="btn btn-dark" onclick="document.getElementById('contact-form').submit();">Envoyer</a>
                </div>
            </form>
        </div>
    </div>
</section>