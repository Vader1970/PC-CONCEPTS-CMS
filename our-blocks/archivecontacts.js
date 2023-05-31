// Register a custom block type for the PC CONCEPTS Contacts Archive.
wp.blocks.registerBlockType("ourblocktheme/archivecontacts", {
  title: "PC CONCEPTS Contacts Archive",

  // Render the block content in the editor.
  // @return {object} The block content.
  edit: function () {
    return wp.element.createElement("div", { className: "our-placeholder-block" }, "Contacts Archive Placeholder");
  },

  // Save the block content.
  save: function () {
    // @return {null} Returns null.
    return null;
  },
});
