// Register a custom block type called "Blogs"
wp.blocks.registerBlockType("ourblocktheme/blogs", {
  // Set the title of the block
  title: "Blogs",

  // Define the edit function that returns a placeholder block
  edit: function () {
    return wp.element.createElement("div", { className: "our-placeholder-block" }, "Blogs Placeholder");
  },

  // Define the save function that returns nothing
  save: function () {
    return null;
  },
});
