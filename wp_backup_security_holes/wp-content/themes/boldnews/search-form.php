<div class="search_main">
    <form method="get" class="searchform" action="<?php bloginfo('url'); ?>" >
        <input type="text" class="field s" name="s" value="<?php _e('Type Search Term Here', 'woothemes') ?>" onfocus="if (this.value == '<?php _e('Type Search Term Here', 'woothemes') ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('Type Search Term Here', 'woothemes') ?>';}" />
        <input name="submit" type="submit" id="submit" class="button" value="<?php _e('Search', 'woothemes'); ?>" />
    </form>    
    <div class="fix"></div>
</div>
