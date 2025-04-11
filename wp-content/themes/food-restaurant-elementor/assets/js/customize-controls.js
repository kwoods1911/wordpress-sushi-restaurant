( function( api ) {

	// Extends our custom "food-restaurant-elementor" section.
	api.sectionConstructor['food-restaurant-elementor'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );