// Register a custom block type for workshops archive.
wp.blocks.registerBlockType("ourblocktheme/archiveworkshops", {
  title: "PC CONCEPTS Workshops Archive",

  // Define the block's edit function that returns a placeholder component.
  edit: function () {
    return wp.element.createElement("div", { className: "our-placeholder-block" }, "Workshops Archive Placeholder");
  },

  // Define the block's save function that returns null, as this block is only used for displaying archives.
  save: function () {
    return null;
  },
});
