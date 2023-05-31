// Import necessary components and functions from WordPress
import { ToolbarGroup, ToolbarButton } from "@wordpress/components";
import { RichText, BlockControls } from "@wordpress/block-editor";
import { registerBlockType } from "@wordpress/blocks";

// Register a new block type called "Generic Heading"
registerBlockType("ourblocktheme/genericheading", {
  title: "Generic Heading",
  attributes: {
    text: { type: "string" }, // The heading text
    size: { type: "string", default: "large" }, // The size of the heading (default is "large")
  },

  // Use the EditComponent to render the block in the editor
  edit: EditComponent,

  // Use the SaveComponent to render the block in the frontend
  save: SaveComponent,
});

// Define the EditComponent, which allows users to edit the block in the editor
function EditComponent(props) {
  // Define a function to handle changes to the heading text
  function handleTextChange(x) {
    props.setAttributes({ text: x });
  }

  // Render the block controls and the RichText editor
  return (
    <>
      <BlockControls>
        <ToolbarGroup>
          <ToolbarButton
            // Set the "isPressed" attribute based on the size of the heading
            isPressed={props.attributes.size === "large"}
            // Set the size of the heading to "large" when the button is clicked
            onClick={() => props.setAttributes({ size: "large" })}
          >
            Large
          </ToolbarButton>
          <ToolbarButton
            isPressed={props.attributes.size === "medium"}
            onClick={() => props.setAttributes({ size: "medium" })}
          >
            Medium
          </ToolbarButton>
          <ToolbarButton
            isPressed={props.attributes.size === "small"}
            onClick={() => props.setAttributes({ size: "small" })}
          >
            Small
          </ToolbarButton>
        </ToolbarGroup>
      </BlockControls>
      <RichText
        // Allow bold and italic formatting in the heading text
        allowedFormats={["core/bold", "core/italic"]}
        // Use the "h1" HTML tag for the heading
        tagName='h1'
        // Set the CSS classes based on the size of the heading
        className={`headline headline--${props.attributes.size}`}
        // Set the value of the heading text to the "text" attribute
        value={props.attributes.text}
        // Call the handleTextChange function when the text changes
        onChange={handleTextChange}
      />
    </>
  );
}

// Define the SaveComponent, which renders the block in the frontend
function SaveComponent(props) {
  // Define a function to determine the HTML tag to use based on the size of the heading
  function createTagName() {
    switch (props.attributes.size) {
      case "large":
        return "h1";
      case "medium":
        return "h2";
      case "small":
        return "h3";
    }
  }

  // Render the RichText content with the appropriate HTML tag and CSS classes
  return (
    <RichText.Content
      // Use the createTagName function to determine the HTML tag
      tagName={createTagName()}
      // Set the value of the heading text to the "text" attribute
      value={props.attributes.text}
      // Set the CSS classes based on the size of the heading
      className={`headline headline--${props.attributes.size}`}
    />
  );
}
