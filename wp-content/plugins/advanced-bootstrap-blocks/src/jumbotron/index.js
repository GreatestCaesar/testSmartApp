const { __ } = wp.i18n;

const { 
  createHigherOrderComponent 
} = wp.compose;

const { 
  registerBlockType,
  getBlockDefaultClassName
} = wp.blocks;

const {
  Toolbar,
  Button,
  Tooltip,
  Panel,
  PanelBody,
  PanelRow,
  FormToggle,
  RangeControl
} = wp.components;

const {
  Fragment
} = wp.element; 

const {
  RichText,
  AlignmentToolbar,
  BlockControls,
  BlockAlignmentToolbar,
  InspectorControls,
  InnerBlocks
} = wp.blockEditor;

import { ReactComponent as Icon } from '../core/icon-bootstrap.svg';

registerBlockType('advanced-bootstrap-blocks/jumbotron', {
  title: __('Jumbotron (BS)', 'advanced-bootstrap-blocks'),
  description: __(''),
  icon: Icon,
  category: 'advanced-bootstrap-blocks',
  keywords: [
      __('advanced-bootstrap-blocks'),
      __('jumbotron'),
  ],
  supports: {
    anchor: true,
  },
  attributes: {
      customClassName: true,
      content: {
          type: 'array',
          source: 'children',
      },
      // allowedBlocks: ['advanced-bootstrap-blocks/card'],
      TEMPLATE: {
        type: 'array',
        default: [
          // ['advanced-bootstrap-blocks/card', {} ,[]],
          // ['advanced-bootstrap-blocks/card', {} ,[]],
          // ['advanced-bootstrap-blocks/card', {} ,[]]
        ]
      },
  },
  edit: function( props ) {
    const {
      className,
      attributes: {
        anchor,
        TEMPLATE,
      },
      setAttributes
    } = props;

    return (
      <div 
        {...anchor ? { id: anchor } : { } }
        className={props.className}
      >
        <InnerBlocks 
          template={ TEMPLATE }
          // allowedBlocks={['advanced-bootstrap-blocks/card']}
        /> 
      </div>
    );
  },
  save: function( props ) {
    return (
      <Fragment>
          <InnerBlocks.Content />
      </Fragment>
    );  
  }
});

const defaultClassName = getBlockDefaultClassName("advanced-bootstrap-blocks/jumbotron");

const setBlockCustomClassName = ( blockName ) => {
	return blockName === defaultClassName ?
    [] :
		blockName;
}

wp.hooks.addFilter(
	'blocks.getBlockDefaultClassName',
	'advanced-bootstrap-blocks/jumbotron/set-block-custom-class-name',
	setBlockCustomClassName
);

const modifyBlockListBlockRow = createHigherOrderComponent( ( BlockListBlock ) => {
    return ( props ) => {
      if (props.block.name == "advanced-bootstrap-blocks/jumbotron") {
        return <BlockListBlock { ...props } className="jumbotron"/>;
      }
      return <BlockListBlock { ...props } />;
    };
}, 'modifyBlockListBlockRow' );

wp.hooks.addFilter( 
  'editor.BlockListBlock', 
  'advanced-bootstrap-blocks/jumbotron/modify-element-edit', 
  modifyBlockListBlockRow 
);

const modifyGetSaveElementRow = (element, blockType, attributes ) => {
	if (!element) {
		return;
	}

  if (blockType.name == 'advanced-bootstrap-blocks/jumbotron') {
    return (
      <div 
        {...attributes.anchor ? { id: attributes.anchor } : null } 
        className={ ["jumbotron", element.props.className].join(" ").trim() }
      >
        {element}
      </div>
    )
  }

	return element;
}

wp.hooks.addFilter(
  'blocks.getSaveElement', 
  'advanced-bootstrap-blocks/jumbotron/modify-element-save', 
  modifyGetSaveElementRow
);
