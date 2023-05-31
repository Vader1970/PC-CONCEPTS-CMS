// Register a new block called "PC CONCEPTS Single Tutor" under the "ourblocktheme" namespace
wp.blocks.registerBlockType("ourblocktheme/singletutor", {
  // Set the title that will be displayed in the block editor
  title: "PC CONCEPTS Single Tutor",

  // Define the block's editing interface using a JSX element
  edit: function () {
    return wp.element.createElement("div", { className: "our-placeholder-block" }, "Single Tutor Placeholder");
  },

  // Define what the block should render on the front-end
  save: function () {
    return null;
  },
});
