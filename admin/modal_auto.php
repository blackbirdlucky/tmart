<!-- Modal Edit-->
<div class="modal fade" id="editModal-auto<?=$value['id_auto'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content shadow">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Редактировать запись <?=$value['id_auto'] ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="?id_auto=<?=$value['id_auto'] ?>" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <input type="text" class="form-control" name="edit_title_auto" value="<?=$value['title_auto'] ?>" placeholder="Название">
                    </div>
                    
                    <div class="form-group">
                        <input type="text" class="form-control" name="edit_desc_auto" value="<?=$value['desc_auto'] ?>" placeholder="Описание">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="edit_class_auto" value="<?=$value['class_auto'] ?>" placeholder="Класс">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="edit_oldprice_auto" value="<?=$value['oldprice_auto'] ?>" placeholder="Без скидки">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="edit_newprice_auto" value="<?=$value['newprice_auto'] ?>" placeholder="Со скидкой">
                    </div>
                    
                    <div class="form-group">
                        <input type="file" class="form-control" name="edit_cover_auto" value="<?=$value['cover_auto'] ?>" placeholder="Обложка 270x270">
                    </div>

                    <div class="form-group">
                        <input type="file" class="form-control" name="edit_slider1_auto" value="<?=$value['slider1_auto'] ?>" placeholder="Слайдер 1">
                    </div>

                    <div class="form-group">
                        <input type="file" class="form-control" name="edit_slider2_auto" value="<?=$value['slider2_auto'] ?>" placeholder="Слайдер 2">
                    </div>

                    <div class="form-group">
                        <input type="file" class="form-control" name="edit_slider3_auto" value="<?=$value['slider3_auto'] ?>" placeholder="Слайдер 3">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="edit_link_auto" value="<?=$value['link_auto'] ?>" placeholder="Видео">
                    </div>

                    <div class="modal-footer">
                        <button type="submit" name="edit-submit_auto" class="btn btn-primary">Обновить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- DELETE MODAL -->
<div class="modal fade" id="deleteModal-auto<?=$value['id_auto'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content shadow">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Карточка <?=$value['id_auto'] ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                <form action="?id_auto=<?=$value['id_auto'] ?>" method="post">
                    <button type="submit" name="delete-submit_auto" class="btn btn-danger">Удалить</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Add-->
<div class="modal fade" tabindex="-1" role="dialog" id="Modal-auto">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content shadow">
            <div class="modal-header">
                <h5 class="modal-title">Добавить авто</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" class="form-control" name="title_auto" value=""
                               placeholder="Название">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="desc_auto" value=""
                               placeholder="Описание">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="class_auto" value=""
                               placeholder="Класс">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="oldprice_auto" value=""
                               placeholder="Без скидки">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="newprice_auto" value=""
                               placeholder="Со скидкой">
                    </div>

                    <div class="form-group">
                        <input type="file" class="form-control" name="cover_auto" value=""
                               placeholder="Обложка">
                    </div>

                    <div class="form-group">
                        <input type="file" class="form-control" name="slider1_auto" value=""
                               placeholder="Слайдер 1">
                    </div>

                    <div class="form-group">
                        <input type="file" class="form-control" name="slider2_auto" value=""
                               placeholder="Слайдер 2">
                    </div>

                    <div class="form-group">
                        <input type="file" class="form-control" name="slider3_auto" value=""
                               placeholder="Слайдер 3">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="link_auto" value=""
                               placeholder="Видео">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                <button type="submit" name="submit_auto" class="btn btn-primary">Добавить</button>
            </div>
            </form>
        </div>
    </div>
</div>

