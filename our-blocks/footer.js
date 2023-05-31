// Register a custom block called "PC CONCEPTS Footer"
wp.blocks.registerBlockType("ourblocktheme/footer", {
  title: "PC CONCEPTS Footer",

  // Define the block editor
  edit: function () {
    // Return the JSX element to render in the editor
    return wp.element.createElement("div", { className: "our-placeholder-block" }, "Footer Placeholder");
  },

  // Define the block output
  save: function () {
    // Return null because this block doesn't render anything in the front-end
    return null;
  },
});
