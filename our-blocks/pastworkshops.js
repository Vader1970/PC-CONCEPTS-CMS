wp.blocks.registerBlockType("ourblocktheme/pastworkshops", {
  // Set the block title that will appear in the editor
  title: "PC CONCEPTS Past Workshops",

  // Define the edit function that will return the block's content in the editor
  edit: function () {
    // Return a placeholder block with the text "Past Workshops Placeholder"
    return wp.element.createElement("div", { className: "our-placeholder-block" }, "Past Workshops Placeholder");
  },

  // Define the save function that will return the block's content when saved
  save: function () {
    // Return null, as this block doesn't have any content that needs to be saved
    return null;
  },
});
