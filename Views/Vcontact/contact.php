<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
    AOS.init();
</script>
<section class="box_contact" id="home">
    <div class="container">
        <div class="row">
            <div class="text-center animate__animated animate__fadeInDownBig">
                <h1 id="section1"><span class="color_text_h1">Contactez-nous ! </span><span class="coffee">☕</span></h1>
                <h5>Tel : +377 00 00 00 00</h5>
                <h5>Place du Palais, 98000, Monaco</h5>
            </div>
            <div class="col map_google" data-aos="fade-up" data-aos-duration="3000">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2346.807794098352!2d7.419984501677398!3d43.73116696248221!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12cdc29276abcc2b%3A0x4ff95fffc2fbc021!2sLe%20Palais%20des%20Princes%20de%20Monaco!5e0!3m2!1sfr!2sfr!4v1633684467121!5m2!1sfr!2sfr"
                    width="600" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div data-aos="zoom-in">
                <div class="card bg-light">
                    <div class="card-body bg-light">
                        <div class="container">
                            <form role="form">
                                <div class="row">
                                    <div class="col-md-6 marge">
                                        <div class="form-group"> <label for="form_name">Prenom *</label>
                                            <input id="form_name" type="text" name="name" class="form-control"
                                                placeholder="Merci de renseigner votre Prenom *" required="required">
                                        </div>
                                    </div>
                                    <div class="col-md-6 marge">
                                        <div class="form-group"> <label for="form_lastname">nom *</label>
                                            <input id="form_lastname" type="text" name="surname" class="form-control"
                                                placeholder="Merci de renseigner votre Nom *" required="required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group marge"> <label for="form_email">Email *</label> <input
                                            id="form_email" type="email" name="email" class="form-control"
                                            placeholder="Merci de renseigner votre Email *" required="required"> </div>
                                    <div class="col-md-12 marge">
                                        <div class="form-group"> <label for="form_message">Message *</label>
                                            <textarea id="form_message" name="message" class="form-control"
                                                placeholder="Merci d'écrire votre Message *" rows="4" required="required"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 map_google"> <input type="submit"
                                            class="btn btn-success btn-send btn-block btn-sm " value="Envoyer">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>