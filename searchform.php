<form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
    <div class="search-form-wrapper flex max-w-md mx-auto">
        <label class="sr-only" for="search-field">
            <?php _e('Search for:', 'wisdom-waypoints'); ?>
        </label>
        <input 
            type="search" 
            id="search-field"
            class="search-field flex-1 px-4 py-2 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-wisdom-purple focus:border-transparent font-avenir" 
            placeholder="<?php echo esc_attr_x('Search...', 'placeholder', 'wisdom-waypoints'); ?>" 
            value="<?php echo get_search_query(); ?>" 
            name="s" 
        />
        <button 
            type="submit" 
            class="search-submit bg-wisdom-purple text-white px-6 py-2 rounded-r-lg hover:bg-opacity-90 transition-colors font-avenir"
        >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
            <span class="sr-only"><?php _e('Search', 'wisdom-waypoints'); ?></span>
        </button>
    </div>
</form>