<ul class="et-social-icons" style='margin-right: 0'>
<?php foreach ($this->container['icon_helper']->get_brands() as $brand_key => $brand_name ): ?>
<?php if ('on' === et_get_option('divi_show_'. $brand_key .'_icon', 'off')) : ?>
    <li class="et-social-icon">
        <a target="_blank" href="<?php echo esc_url(et_get_option('divi_'. $brand_key .'_url', '#')); ?>" class="icon" title='<?php echo $brand_name; ?>'>
            <i class="fab <?php echo $brand_key; ?>" aria-hidden="true"></i>
        </a>
    </li>
<?php endif; ?>
<?php endforeach; ?>
</ul>