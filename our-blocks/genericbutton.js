// Import required dependencies
import ourColors from "../inc/ourColors";
import { link } from "@wordpress/icons";
import { ToolbarGroup, ToolbarButton, Popover, Button, PanelBody, PanelRow, ColorPalette } from "@wordpress/components";
import {
  RichText,
  InspectorControls,
  BlockControls,
  __experimentalLinkControl as LinkControl,
  getColorObjectByColorValue,
} from "@wordpress/block-editor";
import { registerBlockType } from "@wordpress/blocks";
import { useState } from "@wordpress/element";

// Register block type
registerBlockType("ourblocktheme/genericbutton", {
  title: "Generic Button",
  attributes: {
    text: { type: "string" }, // Button text
    size: { type: "string", default: "large" }, // Button size
    linkObject: { type: "object", default: { url: "" } }, // Button link object
    colorName: { type: "string", default: "blue" }, // Button color name
  },
  edit: EditComponent, // Edit component
  save: SaveComponent, // Save component
});

// Edit component
function EditComponent(props) {
  // Link picker visibility
  const [isLinkPickerVisible, setIsLinkPickerVisible] = useState(false);

  // Handle button text change
  function handleTextChange(x) {
    props.setAttributes({ text: x });
  }

  // Handle button click
  function buttonHandler() {
    setIsLinkPickerVisible((prev) => !prev);
  }

  // Handle link change
  function handleLinkChange(newLink) {
    props.setAttributes({ linkObject: newLink });
  }

  // Get current color value
  const currentColorValue = ourColors.filter((color) => {
    return color.name == props.attributes.colorName;
  })[0].color;

  // Handle color change
  function handleColorChange(colorCode) {
    // from the hex value that the color palette gives us, we need to find its color name
    const { name } = getColorObjectByColorValue(ourColors, colorCode);
    props.setAttributes({ colorName: name });
  }

  return (
    <>
      {/* Block controls */}
      <BlockControls>
        <ToolbarGroup>
          <ToolbarButton onClick={buttonHandler} icon={link} />
        </ToolbarGroup>
        <ToolbarGroup>
          <ToolbarButton
            isPressed={props.attributes.size === "large"}
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

      {/* Inspector controls */}
      <InspectorControls>
        <PanelBody title='Color' initialOpen={true}>
          <PanelRow>
            <ColorPalette
              disableCustomColors={true}
              clearable={false}
              colors={ourColors}
              value={currentColorValue}
              onChange={handleColorChange}
            />
          </PanelRow>
        </PanelBody>
      </InspectorControls>

      {/* Rich text */}
      <RichText
        allowedFormats={[]}
        tagName='a'
        className={`btn btn--${props.attributes.size} btn--${props.attributes.colorName}`}
        value={props.attributes.text}
        onChange={handleTextChange}
      />
      {isLinkPickerVisible && (
        <Popover position='middle center' onFocusOutside={() => setIsLinkPickerVisible(false)}>
          <LinkControl settings={[]} value={props.attributes.linkObject} onChange={handleLinkChange} />
          <Button
            variant='primary'
            onClick={() => setIsLinkPickerVisible(false)}
            style={{ display: "block", width: "100%" }}
          >
            Confirm Link
          </Button>
        </Popover>
      )}
    </>
  );
}

function SaveComponent(props) {
  return (
    <a
      href={props.attributes.linkObject.url}
      className={`btn btn--${props.attributes.size} btn--${props.attributes.colorName}`}
    >
      {props.attributes.text}
    </a>
  );
}
