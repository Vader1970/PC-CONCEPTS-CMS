// Register a new block type called "ourblocktheme/singlepost"
wp.blocks.registerBlockType("ourblocktheme/singlepost", {
  // Set the title of the block type
  title: "PC CONCEPTS Single Post",

  // The edit function returns the editable content of the block in the block editor
  edit: function () {
    // Create a new div element with the class name "our-placeholder-block"
    return wp.element.createElement("div", { className: "our-placeholder-block" }, "Single Post Placeholder");
  },

  // The save function returns the saved content of the block on the front-end
  save: function () {
    // Return null as we don't need to save anything for this block
    return null;
  },
});
