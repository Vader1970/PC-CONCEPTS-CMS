// Register a custom block type called "singleprogram" in the "ourblocktheme" namespace
wp.blocks.registerBlockType("ourblocktheme/singleprogram", {
  // Set the title of the block
  title: "PC CONCEPTS Single Program",

  // Define the edit function that returns a placeholder element in the editor
  edit: function () {
    return wp.element.createElement("div", { className: "our-placeholder-block" }, "Single Program Placeholder");
  },

  // Define the save function that returns null, as this block doesn't save any content
  save: function () {
    return null;
  },
});
