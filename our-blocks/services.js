// Registers a new block type called "Services".
// This block displays a list of services offered.
wp.blocks.registerBlockType("ourblocktheme/services", {
  title: "Services",
  edit: function () {
    // Placeholder content to be displayed in the block editor
    return wp.element.createElement("div", { className: "our-placeholder-block" }, "Services Placeholder");
  },
  save: function () {
    // No output is saved for this block
    return null;
  },
});
