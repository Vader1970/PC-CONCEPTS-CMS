// Register a custom block type named "PC CONCEPTS Single Services" under the namespace "ourblocktheme/singleservices".
wp.blocks.registerBlockType("ourblocktheme/singleservices", {
  // Set the title of the block to "PC CONCEPTS Single Services".
  title: "PC CONCEPTS Single Services",

  // Define the edit function that will return a JSX element for the block's editor view.
  edit: function () {
    return wp.element.createElement("div", { className: "our-placeholder-block" }, "Single Services Placeholder");
  },

  // Define the save function that will return null to prevent the block from being saved with any content.
  save: function () {
    return null;
  },
});
