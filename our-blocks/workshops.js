// Register a custom block type for workshops
wp.blocks.registerBlockType("ourblocktheme/workshops", {
  // Set the title for the block
  title: "Workshops",

  // Define the block's editing interface
  edit: function () {
    // Return a div element with a placeholder message
    return wp.element.createElement("div", { className: "our-placeholder-block" }, "Workshops Placeholder");
  },

  // Define the block's saved output
  save: function () {
    // Return null, as the block has no dynamic content
    return null;
  },
});
