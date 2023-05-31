// Import required libraries
import apiFetch from "@wordpress/api-fetch";
import { Button, PanelBody, PanelRow } from "@wordpress/components";
import { InnerBlocks, InspectorControls, MediaUpload, MediaUploadCheck } from "@wordpress/block-editor";
import { registerBlockType } from "@wordpress/blocks";
import { useEffect } from "@wordpress/element";

// Register a new custom block
registerBlockType("ourblocktheme/slide", {
  title: "Slide",

  // Set the block options
  supports: {
    align: ["full"],
  },
  attributes: {
    themeimage: { type: "string" },
    align: { type: "string", default: "full" },
    imgID: { type: "number" },
    imgURL: { type: "string", default: banner.fallbackimage },
  },

  // Define the block editor component
  edit: EditComponent,

  // Define the component used for saving the block content
  save: SaveComponent,
});

// Define the EditComponent for the custom block
function EditComponent(props) {
  // Fetch the image URL when the block is edited
  useEffect(function () {
    if (props.attributes.themeimage) {
      props.setAttributes({ imgURL: `${slide.themeimagepath}${props.attributes.themeimage}` });
    }
  }, []);

  // Fetch the image details when the image ID changes
  useEffect(
    function () {
      if (props.attributes.imgID) {
        async function go() {
          const response = await apiFetch({
            path: `/wp/v2/media/${props.attributes.imgID}`,
            method: "GET",
          });
          props.setAttributes({ themeimage: "", imgURL: response.media_details.sizes.pageBanner.source_url });
        }
        go();
      }
    },
    [props.attributes.imgID]
  );

  // Handle image selection from the media library
  function onFileSelect(x) {
    props.setAttributes({ imgID: x.id });
  }

  // Render the block editor
  return (
    <>
      <InspectorControls>
        <PanelBody title='Background' initialOpen={true}>
          <PanelRow>
            <MediaUploadCheck>
              <MediaUpload
                onSelect={onFileSelect}
                value={props.attributes.imgID}
                render={({ open }) => {
                  return <Button onClick={open}>Choose Image</Button>;
                }}
              />
            </MediaUploadCheck>
          </PanelRow>
        </PanelBody>
      </InspectorControls>

      <div className='hero-slider__slide' style={{ backgroundImage: `url('${props.attributes.imgURL}')` }}>
        <div className='hero-slider__interior container'>
          <div className='hero-slider__overlay t-center'>
            <InnerBlocks allowedBlocks={["ourblocktheme/genericheading", "ourblocktheme/genericbutton"]} />
          </div>
        </div>
      </div>
    </>
  );
}

// Define the SaveComponent for the custom block
function SaveComponent() {
  return <InnerBlocks.Content />;
}
