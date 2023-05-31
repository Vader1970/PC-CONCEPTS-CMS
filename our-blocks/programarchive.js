// Registers a new block type for the "Program Archive" section of the site.
// This block is created using the "our-placeholder-block" class as a placeholder.
wp.blocks.registerBlockType("ourblocktheme/programarchive", {
  title: "PC CONCEPTS Program Archive",

  // Defines the block's appearance and behavior in the editor.
  edit: function () {
    return wp.element.createElement("div", { className: "our-placeholder-block" }, "Program Archive Placeholder");
  },

  // Defines the block's appearance and behavior on the front-end of the site.
  save: function () {
    return null;
  },
});
