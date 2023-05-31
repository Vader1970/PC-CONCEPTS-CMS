// Registers a custom block type for the PC CONCEPTS Services Archive.
wp.blocks.registerBlockType("ourblocktheme/archiveservices", {
  // Sets the title of the block as it appears in the Gutenberg editor.
  title: "PC CONCEPTS Services Archive",

  // Defines the edit function for the block.
  // @returns {Object} A React element representing the block's edit view.
  edit: function () {
    // Defines the save function for the block.
    // @returns {null} Null, as this block type does not need to save any data.
    return wp.element.createElement("div", { className: "our-placeholder-block" }, "Services Archive Placeholder");
  },
  save: function () {
    return null;
  },
});
