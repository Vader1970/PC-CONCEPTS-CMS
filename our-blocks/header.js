// Register a new block type with the WordPress block editor.
wp.blocks.registerBlockType("ourblocktheme/header", {
  // Set the title of the block as it appears in the block inserter menu.
  title: "PC CONCEPTS Header",

  // Define the block's edit function, which renders the block in the editor.
  edit: function () {
    // Return a div with a class name and some placeholder text to render in the editor.
    return wp.element.createElement("div", { className: "our-placeholder-block" }, "Header Placeholder");
  },

  // Define the block's save function, which returns the content to save to the database.
  save: function () {
    // Return null because this block doesn't have any dynamic content to save.
    return null;
  },
});
