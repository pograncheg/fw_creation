<label><?=$this->component->result['title'] . ' '?>
    <select <?=$this->component->result['str']?>>
        <?php foreach ($this->component->result['options'] as $option) : ?>
            <option <?=$option['str'] ?> class=<?= $this->component->result['additional_class'] ?? '' ?>><?=$option['title'] ?></option>
        <?php endforeach; ?>
    </select>
</label>
