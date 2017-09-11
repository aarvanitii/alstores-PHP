

<!-- Holder for mobile navigation -->
<div class="mobile-nav">
    <ul>
    </ul>
    <a href="#" class="close-link"><i class="arrow_up"></i></a>
</div>


<div class="text-center">
    <p class="text-red">Copyright &copy; 2017 | Tous les droits sont réservés | Al Stores</p>
</div>

<!-- Modal -->
<div class="modal fade" id="messageModal" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Demander un devis</h4>
            </div>
            <div class="modal-body">

                <div class="bootstrap-iso">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6 col-lg-12">
                                <form class="form-horizontal" method="POST" action="send_Message.php">
                                    <div class="form-group form-group-lg">
                                        <label class="control-label col-sm-4 requiredField" for="name">
                                            Nom et Prénom<span class="asteriskField">*</span>
                                        </label>
                                        <div class="col-sm-8">
                                            <input class="form-control" id="name" name="name" type="text"/>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label col-sm-4 requiredField" for="tel">
                                            Téléphone
                                            <span class="asteriskField">*</span>
                                        </label>
                                        <div class="col-sm-8">
                                            <input class="form-control" id="tel" name="tel" type="text"/>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label col-sm-4 requiredField" for="email">
                                            Email
                                            <span class="asteriskField">*</span>
                                        </label>
                                        <div class="col-sm-8">
                                            <input class="form-control" id="email" name="email" type="text"/>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label col-sm-4 requiredField" for="address">
                                            Adresse
                                            <span class="asteriskField">*</span>
                                        </label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" rows="2" cols="40" id="address" name="address"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <label class="control-label col-sm-4 requiredField" for="message">
                                            Message
                                            <span class="asteriskField">*</span>
                                        </label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" rows="10" cols="40" id="message" name="message" rows="10"></textarea>
                                            <span class="help-block" id="hint_message">Ecrivez votre message (Demande de devis, Dimensions, genre de travaux ou autres...)</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <button class="btn btn-custom outline" name="sendMessage" type="submit">Envoyer !</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

</body>

<script src="public/resources/js/jquery-1.11.1.min.js"></script>
<script src="public/resources/js/owl.carousel.min.js"></script>
<script src="public/resources/js/bootstrap.min.js"></script>
<script src="public/resources/js/wow.min.js"></script>
<script src="public/resources/js/typewriter.js"></script>
<script src="public/resources/js/jquery.onepagenav.js"></script>
<script src="public/resources/js/main.js"></script>
</body>

</html>

