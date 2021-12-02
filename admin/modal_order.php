<!-- Modal Edit-->
<div class="modal fade" id="editModal-order<?=$value['id_order'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content shadow">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Редактировать запись <?=$value['id_order'] ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="?id_order=<?=$value['id_order'] ?>" method="post">

                    <div class="form-group">
                        <input type="text" class="form-control" name="edit_name_order" value="<?=$value['name_order'] ?>" placeholder="Имя">
                    </div>
                    
                    <div class="form-group">
                        <input type="text" class="form-control" name="edit_fam_order" value="<?=$value['fam_order'] ?>" placeholder="Фамилия">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="edit_mail_order" value="<?=$value['mail_order'] ?>" placeholder="Почта">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="edit_phone_order" value="<?=$value['phone_order'] ?>" placeholder="Номер">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="edit_desc_order" value="<?=$value['desc_order'] ?>" placeholder="Описание">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="edit_city_order" value="<?=$value['city_order'] ?>" placeholder="Город">
                    </div>


                    <div class="form-group">
                        <input type="text" class="form-control" name="edit_address_order" value="<?=$value['address_order'] ?>" placeholder="Адрес">
                    </div>

                    <div class="modal-footer">
                        <button type="submit" name="edit-submit_order" class="btn btn-primary">Обновить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- DELETE MODAL -->
<div class="modal fade" id="deleteModal-order<?=$value['id_order'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content shadow">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Запись № <?=$value['id_order'] ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                <form action="?id_order=<?=$value['id_order'] ?>" method="post">
                    <button type="submit" name="delete-submit_order" class="btn btn-danger">Удалить</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Add-->
<div class="modal fade" tabindex="-1" role="dialog" id="Modal-order">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content shadow">
            <div class="modal-header">
                <h5 class="modal-title">Добавить заявку</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name_order" value=""
                               placeholder="Имя">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="fam_order" value=""
                               placeholder="Фамилия">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="mail_order" value=""
                               placeholder="Почта">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="phone_order" value=""
                               placeholder="Телефон">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="desc_order" value=""
                               placeholder="Описание">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="city_order" value=""
                               placeholder="Город">
                    </div>


                    <div class="form-group">
                        <input type="text" class="form-control" name="address_order" value=""
                               placeholder="Адрес">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                <button type="submit" name="submit_order" class="btn btn-primary">Добавить</button>
            </div>
            </form>
        </div>
    </div>
</div>

