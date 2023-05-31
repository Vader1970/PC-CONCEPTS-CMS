<!-- This is a search form that allows the user to search for content on the site. -->
<form class="search-form" method="get" action="<?php echo esc_url(site_url('/')); ?>">

    <!-- This label describes the search field to users who are visually impaired. -->
    <label class="headline headline--medium" for="s">Perform a New Search:</label>
    <div class="search-form-row">

        <!-- This is the search input field where the user can enter their search terms. -->
        <input placeholder="What are you looking for?" class="s" id="s" type="search" name="s">

        <!-- This is the search button that the user can click to submit their search. -->
        <input class="search-submit" type="submit" value="Search">
    </div>
</form>