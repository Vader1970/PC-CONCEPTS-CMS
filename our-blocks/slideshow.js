// Importing required functions and components from WordPress packages
import { InnerBlocks } from "@wordpress/block-editor";
import { registerBlockType } from "@wordpress/blocks";

// Registering a new block in WordPress with the name 'ourblocktheme/slideshow'
registerBlockType("ourblocktheme/slideshow", {
  // Setting the title and support options for the block
  title: "Slideshow",
  supports: {
    align: ["full"],
  },

  // Defining the block attributes, in this case only 'align' with a default value of 'full'
  attributes: {
    align: { type: "string", default: "full" },
  },

  // Defining the edit and save functions for the block
  edit: EditComponent,
  save: SaveComponent,
});

// Save function, returns the saved content of the block
function SaveComponent() {
  return <InnerBlocks.Content />;
}

// Edit function, returns the editable content of the block
function EditComponent() {
  return (
    // A div that contains the slideshow content
    <div style={{ backgroundColor: "#333", padding: "35px" }}>
      <p style={{ textAlign: "center", fontSize: "20px", color: "#FFF" }}>Slideshow</p>
      <InnerBlocks allowedBlocks={["ourblocktheme/slide"]} />
      {/* InnerBlocks allows only ourblocktheme/slide blocks to be added */}
    </div>
  );
}
