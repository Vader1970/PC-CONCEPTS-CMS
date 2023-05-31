import apiFetch from "@wordpress/api-fetch";
import { Button, PanelBody, PanelRow } from "@wordpress/components";
import { InnerBlocks, InspectorControls, MediaUpload, MediaUploadCheck } from "@wordpress/block-editor";
import { registerBlockType } from "@wordpress/blocks";
import { useEffect } from "@wordpress/element";

// Register the custom block type
registerBlockType("ourblocktheme/banner", {
  title: "Banner",
  supports: {
    align: ["full"],
  },
  attributes: {
    align: { type: "string", default: "full" },
    imgID: { type: "number" },
    imgURL: { type: "string", default: banner.fallbackimage },
  },

  // Specify the edit component for the block
  edit: EditComponent,

  // Specify the save component for the block
  save: SaveComponent,
});

// Define the edit component for the block
function EditComponent(props) {
  // Fetch the image URL from the server when the block is first loaded or when the image ID changes
  useEffect(
    function () {
      if (props.attributes.imgID) {
        async function go() {
          const response = await apiFetch({
            path: `/wp/v2/media/${props.attributes.imgID}`,
            method: "GET",
          });
          props.setAttributes({ imgURL: response.media_details.sizes.pageBanner.source_url });
        }
        go();
      }
    },
    [props.attributes.imgID]
  );

  // Callback function to set the image ID attribute when an image is selected from the media library
  function onFileSelect(x) {
    props.setAttributes({ imgID: x.id });
  }

  // Render the edit component
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
      <div className='page-banner'>
        <div className='page-banner__bg-image' style={{ backgroundImage: `url('${props.attributes.imgURL}')` }}></div>
        <div className='page-banner__content container t-center c-white'>
          <InnerBlocks allowedBlocks={["ourblocktheme/genericheading", "ourblocktheme/genericbutton"]} />
        </div>
      </div>
    </>
  );
}

// Define the save component for the block
function SaveComponent() {
  return <InnerBlocks.Content />;
}
