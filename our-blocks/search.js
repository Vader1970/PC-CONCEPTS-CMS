// This code registers a new block type called "ourblocktheme/search".
wp.blocks.registerBlockType("ourblocktheme/search", {
  // This property sets the title of the block.
  title: "PC CONCEPTS Search",

  // This function defines the edit mode of the block.
  edit: function () {
    // This creates a new div element with a class of "our-placeholder-block".
    return wp.element.createElement("div", { className: "our-placeholder-block" }, "Search Placeholder");
  },

  // This function defines the save mode of the block.
  save: function () {
    // This returns null, meaning the block does not have any content to save.
    return null;
  },
});
