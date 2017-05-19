<div class="modal fade details-1" id="details-1" tableindex="-1" role="dialog" aria-labelledby="details-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title text-center">Chaqueta de Cuero</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="center-block">
                                <img src="img/12-front.jpg" alt="Chaqueta Cuero" class="details img-responsive"/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <h4>Detalles</h4>
                            <p>La chaqueta es muy bonita comprala mientras puedas</p>
                            <hr/>
                            <p>Precio: $23.000</p>
                            <form action="add_cart.php" method="post">
                                <div class="form-group">
                                    <div class="col-xs-3">
                                        <label for="quantity" id="quantity-label">Cantidad</label>
                                        <input type="number" min="1" max="6" class="form-control" id="quantity" name="quantity" />
                                    </div>
                                    </br>
                                    </br>
                                    <div class="form-group">
                                        </br>
                                        <div class="col-xs-3">
                                            <label for="size">Tamano: </label>
                                            <select name="size" id="size" class="form-control">
                                                <option value="S">S</option>
                                                <option value="M">M</option>
                                                <option value="L">L</option>
                                                <option value="XL">XL</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button class="btn btn-warning" type="submit"><span class="glyphicon glyphicon-shopping-cart"></span>Al Carrito</button>
            </div>
        </div>
    </div>
</div>
