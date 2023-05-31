// Register a custom block type named "Single Workshops"
wp.blocks.registerBlockType("ourblocktheme/singleworkshops", {
  // Set the title of the block type
  title: "PC CONCEPTS Single Workshops",

  // Define the edit function which returns a React element to render the block in the editor
  edit: function () {
    return wp.element.createElement("div", { className: "our-placeholder-block" }, "Single Workshops Placeholder");
  },

  // Define the save function which returns null because this block type does not need to save any data
  save: function () {
    return null;
  },
});
