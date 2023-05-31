// Registers a custom block type for displaying single contacts.
wp.blocks.registerBlockType("ourblocktheme/singlecontacts", {
  title: "PC CONCEPTS Single Contacts",

  // Defines the block's editor component.
  // @returns {Element} The editor component for the block.
  edit: function () {
    return wp.element.createElement("div", { className: "our-placeholder-block" }, "Single Contacts Placeholder");
  },

  // Defines the block's front-end rendering.
  // @returns {null} Null is returned because the block does not render anything.
  save: function () {
    return null;
  },
});
