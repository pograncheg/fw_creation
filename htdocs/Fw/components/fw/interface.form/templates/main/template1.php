<main class='main py-3'>
    <div class="container">
        <div class ='row justify-content-center mt-5'>
            <div class="col-6">
                <h2 class="text-center"><?php \Fw\Core\InstanceContainer::getInstance(\Fw\Core\Page::class)->showProperty($this->component->id . '_title'); ?></h2>
                <form <?= $this->component->result['form'] ?>>
                <?php foreach ($this->component->result['elements'] as $el) : ?>
                    <div class="mb-3">
                        <?php if (isset($el['type'])) : ?>
                            <?php if ($el['type'] === 'select') : ?>
                                <label><?= $el['title'] ?><br>
                                    <select <?= $el['str'] ?>>
                                        <?php foreach ($el['options'] as $option) : ?>
                                            <option <?= $option['str'] ?>><?= $option['title'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </label>
                            <?php elseif ($el['type'] === 'textarea') : ?>  
                                <label><?= $el['title'] ?><br><textarea <?= $el['str']?>></textarea></label>
                            <?php elseif ($el['type'] === 'radio') : ?>
                                <label><?= $el['title'] ?></label><br>
                                <?php foreach ($el['options'] as $value) : ?>
                                    <label><input <?="type={$el['type']} " . $el['str'] . $value['str']?> /><?= $value['title'] ?></label>
                                <?php endforeach; ?>
                            <?php endif; ?>    
                        <?php elseif (isset($el['multiple'])) : ?>
                            <label><?= $el['title'] ?></label><br>
                            <?php foreach ($el['options'] as $option) : ?>
                                <label><?= $option['title'] ?> <input <?=$el['str'] . $option['str']?> /></label><br>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <label><?= $el['title'] ?><input <?= $el['str'] ?> /></label>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
                <label>
                <button type="submit" class="btn btn-primary" id="login-btn">Отправить</button>
                </form>
            </div>
        </div>
    </div>
</main>


