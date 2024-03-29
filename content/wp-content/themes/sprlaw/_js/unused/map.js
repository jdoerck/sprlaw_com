
//This script establishes a Google Map with customized TGP pins for multiple locations
//The pins will display an info box with HTML generated content upon clicking on it
//One particular pin for NYC will actually pop up an entirely new window and load a
//google map specific to that area


var MAP_AREA_US = 1;
var MAP_AREA_NYC = 2;
var MAP_AREA_LI = 3;
var MAP_AREA_UPSTATE = 4;
var gmarkers = [];
var map;

function getPopupContent(logo, w, h, info, client, location, iconStr){

    var contentTemplate = '<div class="popup"><img src="/content/wp-content/themes/sprlaw/_i/clients/backup/%LOGO%" alt="" align="center" width="%WIDTH%" height="%HEIGHT%" /><p style="text-align:left;"><b>Client:</b> %CLIENT%<br /><br><b>Location:</b> %LOCATION%<br /><br />%INFO%<br /></p></div>';
    var content = contentTemplate.replace('%LOGO%', logo);
    content = content.replace('%INFO%', info);
    content = content.replace('%CLIENT%', client);
    content = content.replace('%LOCATION%', location);
    content = content.replace('%WIDTH%',w);
    content = content.replace('%HEIGHT%',h);


    return content;
    }

function Markers(category){
    map.closeInfoWindow();
//alert(gmarkers.length)
    if (category.checked==false) { // hide the marker
    for (var i=0;i<gmarkers.length;i++) {
    if (gmarkers[i].category==category.id)  {
    map.removeOverlay(gmarkers[i]);
    }
}
} else { // show the marker again
    for (var i=0;i<gmarkers.length;i++) {
    if (gmarkers[i].category==category.id)  {
    map.addOverlay(gmarkers[i]);
    }
}
}
}

function initialize(mapArea) {
    if (GBrowserIsCompatible()) {
    var icons=[];
    var i=0;
    var baseIcon = new GIcon();
    baseIcon.image = "/content/wp-content/themes/sprlaw/_i/brownfieldsmarker.png";
    baseIcon.iconSize = new GSize(25, 33);
    baseIcon.iconAnchor = new GPoint(5, 34);
    baseIcon.infoWindowAnchor = new GPoint(12, 33);

    function coloredRideshareIcon(iconColor) {
    var color;
    if ((typeof(iconColor)=="undefined") || (iconColor==null)) {
    category = "brownfieldsmarker"
    } else {
    category = iconColor;
    }
if (!icons[iconColor]) {
    var icon = new GIcon(baseIcon);
    icon.image = "/content/wp-content/themes/sprlaw/_i/"+ category +".png";
    icons[iconColor]=icon;

    }
return icons[iconColor];
}

function createMarker(point,iconStr,html) {
    var icon = coloredRideshareIcon(iconStr);
    var marker = new GMarker(point,icon);
    if (iconStr) {
    marker.category = iconStr;

    } else {
    marker.category = "brownfieldsmarker";
    }

marker.bindInfoWindowHtml(html);
//GEvent.addListener(marker, "click", function() {
    //    marker.openInfoWindowHtml(html);
    //    map.updateInfoWindow();
    //});


gmarkers[i] = marker;
i++;
return marker;

}

// Display the map, with some controls and set the initial location and zoom
var mapContainer;
var coord;
var zoom;

if(mapArea == MAP_AREA_US){

    mapContainer = 'clientMap';
    //coord = new GLatLng(40.761457, -73.973497);
    coord = new GLatLng(40.96, -73.8);
    zoom = 10;
    }

if(mapArea == MAP_AREA_NYC){

    mapContainer = 'clientMap';
    coord = new GLatLng(40.761457,-73.973497);
    zoom = 12;
    }

if(mapArea == MAP_AREA_LI){

    mapContainer = 'clientMap';
    coord = new GLatLng(40.834593,-72.979431);
    zoom = 9;
    }

if(mapArea == MAP_AREA_UPSTATE){

    mapContainer = 'clientMap';
    coord = new GLatLng(41.106261,-73.865891);
    zoom = 10;
    }


map = new GMap2(document.getElementById(mapContainer));
map.addControl(new GLargeMapControl());
map.setMapType(G_SATELLITE_MAP);
map.addControl(new GMapTypeControl());
map.setCenter(coord, zoom);


if(mapArea == MAP_AREA_US){


    //set up all the other markers
    //include the appropriate HTML for the window box and the correct geo coordinates

    var point = new GLatLng(40.826995,-73.927946);
    var marker = createMarker(point, "developmentmarker", getPopupContent('yankees.jpg',150,90, 'SPR represented the New York Yankees in connection with the construction of the new Yankee stadium in the Bronx.   The project also included the construction of additional parking facilities, and the creation of new parkland and recreational facilities at and in the immediate vicinity of the existing stadium, as well as along the Harlem River waterfront.  SPR also successfully defended the New York Yankees in the lawsuit that challenged the environmental review and parkland aspect of this project.<br/><br/>', 'New York Yankees', 'Bronx, NY', 'developmentmarker'))
    map.addOverlay(marker);


    var point = new GLatLng(40.846788,-73.788667);
    var marker = createMarker(point, "developmentmarker", getPopupContent('pulte.jpg',108,120, 'SPR represents the developer of a proposed townhouse development in City Island on the shores of the Long Island Sound. The firm represents the developer with regard to environmental permitting and hazardous materials issues.<br/><br/>', 'City Island Estates', 'City Island, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.840375,-73.705035);
    var marker = createMarker(point, "developmentmarker", getPopupContent('fpo.jpg',280,80, 'SPR led the team preparing the Environmental Impact Statement for an approximately 400-unit senior housing development in the Village of Port Washington North. The proposed project was approved by the Village and SPR successfully defended the project approval in a subsequent attack by community groups.<br/><br/>', 'Mill Pond Senior Housing', 'Port Washington North, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(41.2376671,-74.1944529);
    var marker = createMarker(point, "developmentmarker", getPopupContent('tuxedo_reserve_t.jpg',217,120, 'SPR served as environmental counsel to the Related Companies in connection with the Tuxedo Reserve project, a planned residential and mixed-use project on 2,374 acres, primarily in the Town of Tuxedo in Orange County, New York. SPR provided legal advice in connection with the preparation of the Environmental Impact Statement and Supplemental Environmental Impact prepared for this project, which originally contemplated the construction of over 2,000 dwelling units and over 500,000 square feet of commercial space. SPR also provided advice on a variety of zoning and permitting issues relating to this project.<br/><br/>', 'Tuxedo Reserve', 'Tuxedo, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(41.07,-73.9);
    var marker = createMarker(point, "developmentmarker", getPopupContent('ny_thruway.jpg',150,90, 'SPR represents the New York State Thruway Authority, which together with the Metro North Railroad, a subsidiary of the Metropolitan Transportation Authority, is undertaking the Tappan Zee Bridge/I287 Corridor environmental review. This process will address the possible replacement of the Tappan Zee Bridge. The Firm is advising the Project Sponsors with regard to the environmental review of the proposal pursuant to both NEPA and SEQRA, as well as to environmental permitting and related requirements.<br/><br/>', 'New York State Thruway Authority - Tappan Zee Corridor', 'Tappan Zee, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(41.092449,-73.862457);
    var marker = createMarker(point, "brownfieldsmarker", getPopupContent('roseland_t.gif',150,120, 'SPR represents Roseland/Sleepy Hollow, LLC, as affiliate of Roseland Properties, the developer of the former General Motors Assembly site in Sleepy Hollow. The proposed Lighthouse Landing development is a mixed-use project, including residential, commercial and open space uses on a 97-acre site former industrial property bordering the Hudson River. The Firm has advised Roseland with respect to its participation in the Brownfield Cleanup Program and its proposed investigation and remediation of this former industrial site. In addition to the Brownfield work SPR is also assisting with environmental permitting issues, especially those pertinent to shoreline development, as well as preparation of an EIS.<br/><br/>', 'Roseland/Sleepy Hollow, LLC - Lighthouse Landing', 'Sleepy Hollow, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(41.159306,-73.764588);
    var marker = createMarker(point, "municipalmarker", getPopupContent('chappaqua_t.jpg',150,120, 'SPR served as environmental counsel to the Chappaqua Central School District with respect to its construction of a new 750-student middle school, as well as additions and renovations to two existing District schools. SPR represented the District throughout the environmental review process, including retention of consultants, preparation of environmental documentation, including an EIS and SEQRA Findings, and presentations at public hearings. In addition, SPR assisted the District in obtaining approvals from the New York City Department of Environmental Protection required for construction within the New York City watershed. The Firm also successfully defended the District in litigation challenging its approval of the new middle school. The new school opened in October 2003.<br/><br/>', 'Chappaqua Central School District', 'Chappaqua, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(41.202243,-73.726177);
    var marker = createMarker(point, "developmentmarker", getPopupContent('westchester_hospital_t.jpg',150,105, 'SPR is representing Northern Westchester Hospital in Mount Kisco New York in obtaining rezoning and site plan approvals for its proposed expansion of the hospital and construction of a 57,000 square foot medical office building. The firm is coordinating the preparation of the scope and other supporting documents for the project’s SEQRA review, and working with the involved agencies to obtain other required approvals. This includes the acceptance of a Stormwater Pollution Prevention Plan by the New York City Department of Environmental Protection, which has authority because of the project’s location in the City’s Croton Water Supply System watershed.<br/><br/>', 'Northern Westchester Hospital', 'Mount Kisco, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.679961,-73.584222);
    var marker = createMarker(point, "municipalmarker", getPopupContent('roosvelt_union_t.jpg',150,110, 'SPR served as environmental counsel to the Roosevelt Union Free School District with respect to its District-Wide Improvement Program, which is designed to relieve severe overcrowding, degraded physical conditions and inadequate and deficient equipment in the District&#39;s schools and to provide District students with equal educational opportunities. The Program includes the construction of three new elementary schools and a separate middle school, and the renovation and expansion of the existing junior-senior high school to a high school-only facility, as well as the introduction of a pre-kindergarten program into each of the elementary schools. SPR represented the District throughout the environmental review process for the Program, which included assistance in the retention of consultants, preparation of environmental documentation for the SEQRA process, including the preparation of an EIS and SEQRA Findings, and presentations at public hearings. The environmental review process culminated with the District&#39;s voters approving the Program through a bond referendum held in April 2004.  A number of the proposed schools have been completed and the entire Program is anticipated to be completed in 2009.<br/><br/>', 'Roosevelt Union School District', 'Roosevelt, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.941128,-72.681491);
    var marker = createMarker(point, "developmentmarker", getPopupContent('traditional_links_t.jpg',93,120, 'SPR provided legal advice in connection with the preparation of an Environmental Impact Statement for the proposed Traditional Links golf course in Riverhead, New York. SPR also assisted in connection with related permits and approvals required to construct this world-class golf course in Long Island.<br/><br/>', 'Traditional Links Golf Course', 'Riverhead, New York'))
    map.addOverlay(marker);

    var point = new GLatLng(40.943898,-72.300296);
    var marker = createMarker(point, "municipalmarker", getPopupContent('lipa.jpg',300,153, 'SPR is environmental counsel to the Long Island Power Authority (LIPA) and represented LIPA in connection with the preparation of an Environmental Impact Statement for the construction of a transmission line between the LIPA substations located in Southampton and Bridgehampton on the East End of Long Island.   The project, which also included an expansion of the Bridgehampton substation, was controversial because of the proposal to install part of the line aboveground on poles installed along the route of existing overhead distribution lines.  SPR led the EIS project team and defended LIPA when its project approval was challenged in New York State Supreme Court.  The matter was successfully resolved when LIPA and the Town of Southampton entered into an agreement on a funding mechanism to permit the entire installation of the line underground without burdening LIPA ratepayers as a whole with the expense for that additional work.<br/><br/>', 'LIPA &mdash; Southampton to Bridgehampton Transmission Line Project', 'Bridgehampton, New York'))
    map.addOverlay(marker);

    var point = new GLatLng(40.691976,-73.810545);
    var marker = createMarker(point, "developmentmarker", getPopupContent('greater_jamaica_3_t.jpg',171,120, 'SPR has represented the Greater Jamaica Development Corporation, a private entity that acts to foster and facilitate development in Jamaica. The Firm advised the Corporation in terms of environmental permitting and approvals necessary for its proposed redevelopment projects.<br/><br/>', 'Greater Jamaica Development Corporation', 'Jamaica, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.749794,-73.846086);
    var marker = createMarker(point, "developmentmarker", getPopupContent('us_tennis_2_t.jpg',150,96, 'SPR served as environmental counsel in connection with the expansion of the United States Tennis Association (USTA) facilities in Flushing Meadows, Queens. SPR provided legal advice in connection with the Environmental Impact Statement prepared for the expansion, and also assisted the USTA in obtaining related permits and approvals.<br/><br/>', 'United States Tennis Association', 'Flushing Meadows, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.7875,-73.84639);
    var marker = createMarker(point, "developmentmarker", getPopupContent('nytimes_print_t.jpg',91,120, 'SPR served as environmental counsel in connection with the Environmental Impact Statement prepared for the New York Times color printing plant in College Point, Queens.<br/><br/>', 'New York Times color printing plant', 'College Point, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.8043162, -73.8755596);
    var marker = createMarker(point, "developmentmarker", getPopupContent('bronx_terminal_t.jpg',100,69, 'SPR currently represent the Related Companies’ affiliate Related Retail Corporation with respect to the proposed redevelopment of the current site of the Bronx Terminal Market on the Harlem River, as a large-scale retail facility including a hotel. SPR is providing legal advice with respect to the site’s participation in the Brownfield Cleanup Program, into which the project was accepted in late 2004. SPR also advised the client with respect to waterfront permitting issues and other environmental matters.<br/><br/>', 'Bronx Terminal Market', 'Bronx, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.743908,-73.973780);
    var marker = createMarker(point, "developmentmarker", getPopupContent('east_river_coned_t.jpg',180,95, 'SPR is currently representing East River Realty Co., LLC, as lead environmental counsel associated with the redevelopment of four parcels of property located along the First Avenue on the east side of Midtown Manhattan. The properties are the former location of Consolidated Edison’s Waterside Generating Station. East River Realty intends to construct a significant, high-rise development on the site. As counsel to the project, SPR prepared the EIS required for the sale of the property from Consolidated Edison, and is presently steering the proposed development through the New York City urban land use review procedure and the concomitant EIS process for the development plan. Moreover, SPR has overseen the challenging clean-up of the major former industrial site, including obtaining a Brownfields designation for the site.<br/><br/>', 'East River Realty - ConEd', 'New York, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.7621302,-73.9499426);
    var marker = createMarker(point, "developmentmarker", getPopupContent('octagon2_t.jpg',200,80, 'SPR represented Becker and Becker and MEPT Octagon in connection with the Octagon project, an approximately 400-unit residential development on Roosevelt Island in New York City.  The project was developed in conjunction with the renovation of the Octagon, a historic landmark that used to be part of the New York Lunatic Asylum located on Roosevelt Island.  SPR also successfully defended a litigation challenging the Southtown project, a joint venture between SPR clients the Related Companies and the Hudson Companies, that is also located on Roosevelt Island. The first set of buildings of this mixed-use project has been completed and construction is ongoing.<br/><br/>', 'Octagon Project - Roosevelt Island', 'Roosevelt Island, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.7535661, -74.0035885);
    var marker = createMarker(point, "developmentmarker", getPopupContent('fpo.jpg', 280, 80, 'SPR is representing Hudson Yards Development Corp. with respect to the environmental review of the proposal by the Related Companies to develop residential and commercial buildings and significant public open space over the western portion of the John D. Caemmerer West Side Storage Yard, used by Long Island Rail Yard.  SPR’s representation to date includes advising HYDC and the City with respect to the appropriate contents of the Environmental Impact Statement for the project, which is currently in progress. <br/><br/>', 'Western Rail Yards', 'New York, NY'))
    map.addOverlay(marker);


    var point = new GLatLng(40.744684,-73.948508);
    var marker = createMarker(point, "developmentmarker", getPopupContent('queens_west_1_t.jpg',104,120, 'SPR is representing Queens West Development Corporation (QWDC), a subsidiary of New York State’s Empire State Development Corporation (ESDC), in connection with New York’s largest mixed use public-private development. During the early planning stages of this major initiative to redevelop a 74 acre area of the Long Island City waterfront, the firm provided environmental and land use counsel to the Urban Development Corporation (now d/b/a ESDC) in connection with development of the General Project Plan and the environmental impact statement (EIS) process. It subsequently represented ESDC in successfully defeating litigation challenging the adequacy of the EIS. The firm has handled all waterfront permitting issues for the development of parks and the waterfront esplanade, which involved obtaining permits from the U.S. Army Corps of Engineers and New York State Department of Environmental Conservation and other agencies. The firm is currently representing QWDC in connection with all aspects of remediation of legacy contamination from the area’s long and varied industrial uses, including remedies under auspices of either the State’s Voluntary Cleanup Program or the Brownfield Cleanup Program.<br/><br/>', 'Queens West', 'Long Island City , NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.704587,-74.000816);
    var marker = createMarker(point, "developmentmarker", getPopupContent('fpo.jpg',280,80, 'SPR is serving as environmental and regulatory counsel to the New York City Economic Development Corporation in connection with its East River Waterfront Development Study, which is focused on redeveloping and increasing waterfront access along the East River between Battery Park and the East River Park.<br/><br/>', 'East River Water Front', 'New York, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.6894501,-74.016792);
    var marker = createMarker(point, "developmentmarker", getPopupContent('governors_island_1_t.jpg',150,90, 'The Empire State Development Corporation and Governors Island Preservation and Education Corporation (GIPEC) have retained SPR to serve as counsel in connection with the environmental review of the development plan for Governors Island. This representation follows SPR’s prior representation of the United States Department of General Services in connection with the Generic EIS prepared in connection with the United States’ sale of the island to the State of New York.<br/><br/>', 'Governors Island', 'Governors Island, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.71148,-74.015825);
    var marker = createMarker(point, "developmentmarker", getPopupContent('battery_park_t.jpg',91,120, 'The New York State Urban Development Corporation (now the Empire State Development Corporation) retained SPR to provide legal advice in connection with the environmental review that led to the development of Battery Park City.<br/><br/>', 'Battery Park City', 'New York, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.757616,-74.002943);
    var marker = createMarker(point, "developmentmarker", getPopupContent('javits_t.jpg',150,90, 'SPR is currently representing the Javits Convention Center in connection with its proposal to expand the center. SPR served as environmental counsel in connection with the environmental review of the original Javits Center, and reprises that role for the proposed expansion.<br/><br/>', 'Javits Center', 'New York, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.765591,-73.997726);
    var marker = createMarker(point, "developmentmarker", getPopupContent('hudson_river_1_t.jpg',45,120, 'SPR represented the Hudson River Park Trust (and predecessor entities) in connection with the environmental review conducted in connection with the development of the Hudson River Park in Manhattan. SPR served as environmental counsel in connection with the Environmental Impact Statement required for the Park, and worked with State and local agencies in connection with the development of this exciting new park along the Hudson River waterfront. SPR continues to serve as counsel to the Hudson River Park Trust as it implements its overall plan for the park.<br/><br/>', 'Hudson River Park Trust', 'New York, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.772721,-73.984169);
    var marker = createMarker(point, "developmentmarker", getPopupContent('lincoln_center_3_t.jpg',150,110, 'SPR is assisting Lincoln Center by serving as environmental counsel in connection with its proposed expansion.<br/><br/>', 'Lincoln Center', 'New York, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.776902,-73.990517);
    var marker = createMarker(point, "developmentmarker", getPopupContent('riverside_park_t.jpg',90,120, 'SPR was lead environmental counsel for the preparation of the Environmental Impact Statement for the Riverside South project, a General Large-Scale Development located along Manhattan’s West Side between West 59th Street and West 72nd Street. This project, developed by Donald Trump, was approved by the City of New York in 1992. Since that time, SPR has continued to represent the developer, successfully defending a number of challenges to the project brought in both New York State and federal courts.<br/><br/>', 'Riverside South', 'New York, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.743290,-74.007769);
    var marker = createMarker(point, "brownfieldsmarker", getPopupContent('georgetown_t.jpg',160,120, 'SPR represented the Georgetown Company, the developer of IAC Corporation’s new corporate headquarters building -- the first building in New York designed by Frank Gehry -- which was built on a portion of the former Con Edison 18th Street Gas Works. The firm’s representation on this project included negotiating an allocation of responsibility among all stake-holders for the environmental remediation of residual contamination from decades of manufactured gas production and assorted waterfront industrial uses. SPR negotiated a Voluntary Cleanup Agreement with the State of New York, and subsequently assisted Georgetown in becoming one of the first Volunteers to participate in and receive a Certificate of Completion of the then newly enacted Brownfields Cleanup Program.  SPR also negotiated a transfer of risk with the contractor conducting the site cleanup, backed by environmental insurance.<br/><br/>', 'Georgetown Company', 'New York, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.749338,-73.955154);
    var marker = createMarker(point, "brownfieldsmarker", getPopupContent('river_east_3_t.jpg',150,120, 'The firm is representing the developer of the River East project, a 1.2-million-square-foot residential and commercial project in Long Island City. SPR has helped to secure the necessary tidal wetlands permits, contaminated soil remediation plan and other regulatory approvals that authorize the construction of two planned 30-story glass towers, four 8-story buildings and a waterfront public park that local residents say will greatly enhance their community.<br/><br/>', 'River East Project', 'New York, NY'))
    map.addOverlay(marker);

//		  var point = new GLatLng(40.805126,-73.939214);
//		  var marker = createMarker(point, "brownfieldsmarker", getPopupContent('harlem_hotel_t.jpg',90,120, 'Located on the southeast corner of 125th Street and Park Avenue, and designed by world-renowned architect, Enrique Norton, Harlem Park is a proposed $236 million, mixed-use residential and commercial development that would also be the first new hotel built in Harlem in decades - a 208-room Marriott Courtyard. On behalf of co-developers Majic Development Group and 1800 Park Ave. LLC, SPR was instrumental in securing the Brownfields Cleanup Agreement with the State of New York that is a driving force behind this redevelopment.<br/><br/>', 'Harlem Park', 'New York, NY'))
//	      map.addOverlay(marker);

    var point = new GLatLng(40.756054,-73.986951);
    var marker = createMarker(point, "municipalmarker", getPopupContent('fpo.jpg', 280, 80, 'SPR serves as environmental counsel to the Empire State Development Corporation and the New York City Economic Development Corporation. It provides advice on a number of development projects and other matters throughout New York City and New York State. For further information on the ESDC, please visit <a href="http://www.empire.state.ny.us/default.asp" style="color:Red">http://www.empire.state.ny.us/default.asp</a>.<br/><br/>', 'Empire State Development Corporation', 'New York, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.7581295, -73.8430994);
    var marker = createMarker(point, "developmentmarker", getPopupContent('willets_point.jpg',150,97, 'SPR was retained by the New York City Economic Development Corporation (EDC) to serve as environmental counsel for the preparation of a Generic Environmental Impact Statement for the City of New York’s proposed redevelopment of a 61 acre parcel in Willets Point Queens.  The Willets Point project is a proposed redevelopment of a substandard and underutilized industrial area into a lively, mixed-use, sustainable community and regional destination.  Besides the GEIS, the Firm assisted the City in other aspects of the proposed project, including hazardous waste remediation and environmental issues relating to the purchase of existing parcels within the project area and the parcels to be utilized to relocate existing businesses.  The project, which required the rezoning of the area and adoption of an urban renewal plan, was approved in the Fall of 2008.<br/><br/>', 'Willets Point Development Project', 'Willets Point, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.808224,-73.961889);
    var marker = createMarker(point, "developmentmarker", getPopupContent('columbia_university.jpg',180,116, 'SPR represents the Empire State Development Corporation (ESDC), an involved agency in the environmental review of the rezoning of a 35-acre portion of Manhattanville in West Harlem, a rezoning which facilitates Columbia University’s proposed expansion on 17 of the 35 acres.  The Columbia University development would create a new, 6.8 million square foot graduate campus in West Harlem that is to include state-of-the-art educational and academic research facilities, publicly-accessible open space, and other significant elements.  SPR assisted in the preparation of the rezoning’s environmental impact statement and ESDC’s General Project Plan pertaining to the Columbia project, and continues to be involved in litigation brought to challenge the project.<br/><br/>', 'Columbia University Manhattanville Expansion', 'New York, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.73558,-74.172247);
    var marker = createMarker(point, "municipalmarker", getPopupContent('newark.jpg',100,154, 'SPR advised the Port Authority of New York and New Jersey with regard to the preparation of the Environmental Impact Statement for the construction of a monorail system that connects the Northeast Corridor rail lines with the New Liberty Airport main terminal and long term parking areas.  The EIS was issued by the Federal Aviation Administration and the monorail was constructed.<br/><br/>', 'Newark Light Rail Project ', 'Newark, NJ'))
    map.addOverlay(marker);

    var point = new GLatLng(40.715973,-73.967342);
    var marker = createMarker(point, "developmentmarker", getPopupContent('domino.jpg',100,121, 'The Firm represents The Refinery, LLC, the developer of the former Domino Sugar facility on the East River in Brooklyn, with regard to waterfront permitting.  The proposed development involves construction of new buildings that will include up to 120,000 gross square feet (gsf) of retail/commercial space, up to 100,000 gsf of community facility use, and up to 2,400 residential units (2.64 million gsf). Thirty (30) percent of the units will be offered as affordable housing.   In addition, the project includes development of approximately 4.1 acres of public open space including an approximately 1-acre lawn at the center of the site and a waterfront esplanade along the East River.<br/><br/>', 'Refinery LLC &mdash; Redevelopment of Former Domino Sugar Factory, Brooklyn, New York', 'Brooklyn, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.701766,-74.011245);
    var marker = createMarker(point, "developmentmarker", getPopupContent('battery_maritime.jpg',180,135, 'SPR represents Dermot BMB, LLC, with respect to the proposed renovation and expansion of the historic Battery Maritime Building in lower Manhattan.  The proposal would create public indoor space, a boutique hotel, and a rooftop bar and restaurant.  SPR is assisting the developer in securing permits from the New York State Department of Environmental Conservation and the U.S. Army Corps of Engineers.<br/><br/>', 'Battery Maritime Building Redevelopment &mdash; Manhattan', 'New York, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.734524,-73.838577);
    var marker = createMarker(point, "developmentmarker", getPopupContent('sky_view_parc.jpg',150,96, 'SPR represents the Muss Development Corporation with respect to the development of SkyViewParc, a mixed-use development located on the former Flushing Industrial Park site.  SPR assisted with all aspects of the client’s application to clean up the property under the auspices of the New York State Brownfield Cleanup Program, including preparation of the initial application, revisions, submission of reports and all other aspects of this State-supervised cleanup.  SPR has also assisted the developer in seeking cost recovery from the former owner of the property responsible for the contamination.<br/><br/>', 'Muss Development Corporation &mdash; Sky View Parc', 'New York, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.642481,-73.788071);
    var marker = createMarker(point, "developmentmarker", getPopupContent('airtrain.jpg',180,109, 'SPR advised the Port Authority of New York and New Jersey with regard to the preparation of the Environmental Impact Statement for the construction of the JFK Airtrain, which runs from Jamaica Queens (where it connects with the LIRR and NYC Subway) to the main terminals at JFK aiport.  The EIS was issued by the Federal Aviation Administration and the Airtrain was constructed.<br/><br/>', 'JFK Airtrain', 'New York, NY'))
    map.addOverlay(marker);

//	      var point = new GLatLng(40.6951769,-73.9874105);
//	      var marker = createMarker(point, "developmentmarker", getPopupContent('forest_city.jpg',180,120, 'SPR represents the Empire State Development Corporation, which is lead agency for the environmental review of Forest City Ratner Companies proposal to develop a new basketball arena for the Nets, along with a major mixed-use development, in downtown Brooklyn.  SPR presently is working with the project team to prepare the Environmental Impact Statement for this project.<br/><br/>', 'Empire State Development Corporation', 'Brooklyn, NY'))
//	      map.addOverlay(marker);

    var point = new GLatLng(40.989286,-73.879222);
    var marker = createMarker(point, "municipalmarker", getPopupContent('hastings.jpg',90,120, 'SPR is environmental counsel to the Village of Hastings-on-Hudson in connection with the Village&#39;s efforts related to the remediation and ultimate redevelopment of a privately-owned site located on the Hudson River waterfront that is listed on the New York State superfund list due to its contamination with polychlorinated biphenyls (PCBs) and other pollutants. These efforts have included the retention of consultants to evaluate conditions at the site, coordination with the New York State Department of Environmental Conservation in its remedial and enforcement activities at the site, and litigation against the site&#39;s current owner. That litigation, which was brought by the Village together with the Hudson Riverkeeper Fund, a regional environmental group, resulted in a consent order outlining the obligations of the owner with respect to the remediation of the site.  In addition, SPR has assisted the Village with respect to its participation in efforts undertaken with the site owner and the local waterfront revitalization program to develop a post-remediation redevelopment plan for the site.<br/><br/>', 'Village of Hastings-on-Hudson', 'Hastings, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.7294018,-73.9065883);
    var marker = createMarker(point, "brownfieldsmarker", getPopupContent('phelps-dodge.jpg', 150,120, 'SPR represents the purchaser of this one-time copper smelter property and listed Class-2 Inactive Hazardous Waste Site who is redeveloping its approximately 39-acres for commercial and light industrial use. Working closely with the prior owner, the developer and the regulators, SPR helped secure the Record of Decision and other regulatory approvals that have cleaned up this long-contaminated waterfront parcel and brought much needed development and jobs to this area after years of decline.<br/><br/>', 'Phelps Dodge Brownfield Project', 'Maspeth, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.497223,-74.247665);
    var marker = createMarker(point, "brownfieldsmarker", getPopupContent('fpo.jpg',280,80, 'SPR currently represents Muss Development Corporation with respect to a proposed large-scale residential development on Prince’s Point, which borders Staten Island. Shortly after Muss purchased the property, it was discovered to be seriously contaminated with hazardous wastes from historic uses, resulting in its listing as an Inactive Hazardous Waste Disposal Site under the State Superfund Program. SPR provided legal advice pertaining to the remediation of the site, which took many years to complete, and is currently providing representation concerning State Tidal and Freshwater Wetlands permitting and associated environmental issues.<br/><br/>', 'Muss Development - Prince’s Point', 'Staten Island, NY'))
    map.addOverlay(marker);




    }
//
//NYC REGION//////////////////////////////////////////////////////////////////////////
//
if(mapArea == MAP_AREA_NYC){


    var point = new GLatLng(40.691976,-73.810545);
    var marker = createMarker(point, "developmentmarker", getPopupContent('greater_jamaica_3_t.jpg',171,120, 'SPR has represented the Greater Jamaica Development Corporation, a private entity that acts to foster and facilitate development in Jamaica. The Firm advised the Corporation in terms of environmental permitting and approvals necessary for its proposed redevelopment projects.<br/><br/>', 'Greater Jamaica Development Corporation', 'Jamaica, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.749794,-73.846086);
    var marker = createMarker(point, "developmentmarker", getPopupContent('us_tennis_2_t.jpg',150,96, 'SPR served as environmental counsel in connection with the expansion of the United States Tennis Association (USTA) facilities in Flushing Meadows, Queens. SPR provided legal advice in connection with the Environmental Impact Statement prepared for the expansion, and also assisted the USTA in obtaining related permits and approvals.<br/><br/>', 'United States Tennis Association', 'Flushing Meadows, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.7875,-73.84639);
    var marker = createMarker(point, "developmentmarker", getPopupContent('nytimes_print_t.jpg',91,120, 'SPR served as environmental counsel in connection with the Environmental Impact Statement prepared for the New York Times color printing plant in College Point, Queens.<br/><br/>', 'New York Times color printing plant', 'College Point, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.8043162, -73.8755596);
    var marker = createMarker(point, "developmentmarker", getPopupContent('bronx_terminal_t.jpg',100,69, 'SPR currently represent the Related Companies’ affiliate Related Retail Corporation with respect to the proposed redevelopment of the current site of the Bronx Terminal Market on the Harlem River, as a large-scale retail facility including a hotel. SPR is providing legal advice with respect to the site’s participation in the Brownfield Cleanup Program, into which the project was accepted in late 2004. SPR also advised the client with respect to waterfront permitting issues and other environmental matters.<br/><br/>', 'Bronx Terminal Market', 'Bronx, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.743908,-73.973780);
    var marker = createMarker(point, "developmentmarker", getPopupContent('east_river_coned_t.jpg',180,95, 'SPR is currently representing East River Realty Co., LLC, as lead environmental counsel associated with the redevelopment of four parcels of property located along the First Avenue on the east side of Midtown Manhattan. The properties are the former location of Consolidated Edison’s Waterside Generating Station. East River Realty intends to construct a significant, high-rise development on the site. As counsel to the project, SPR prepared the EIS required for the sale of the property from Consolidated Edison, and is presently steering the proposed development through the New York City urban land use review procedure and the concomitant EIS process for the development plan. Moreover, SPR has overseen the challenging clean-up of the major former industrial site, including obtaining a Brownfields designation for the site.<br/><br/>', 'East River Realty - ConEd', 'New York, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.7621302,-73.9499426);
    var marker = createMarker(point, "developmentmarker", getPopupContent('octagon2_t.jpg',200,80, 'SPR represented Becker and Becker and MEPT Octagon in connection with the Octagon project, an approximately 400-unit residential development on Roosevelt Island in New York City.  The project was developed in conjunction with the renovation of the Octagon, a historic landmark that used to be part of the New York Lunatic Asylum located on Roosevelt Island.  SPR also successfully defended a litigation challenging the Southtown project, a joint venture between SPR clients the Related Companies and the Hudson Companies, that is also located on Roosevelt Island. The first set of buildings of this mixed-use project has been completed and construction is ongoing.<br/><br/>', 'Octagon Project - Roosevelt Island', 'Roosevelt Island, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.744684,-73.948508);
    var marker = createMarker(point, "developmentmarker", getPopupContent('queens_west_1_t.jpg',104,120, 'SPR is representing Queens West Development Corporation (QWDC), a subsidiary of New York State’s Empire State Development Corporation (ESDC), in connection with New York’s largest mixed use public-private development. During the early planning stages of this major initiative to redevelop a 74 acre area of the Long Island City waterfront, the firm provided environmental and land use counsel to the Urban Development Corporation (now d/b/a ESDC) in connection with development of the General Project Plan and the environmental impact statement (EIS) process. It subsequently represented ESDC in successfully defeating litigation challenging the adequacy of the EIS. The firm has handled all waterfront permitting issues for the development of parks and the waterfront esplanade, which involved obtaining permits from the U.S. Army Corps of Engineers and New York State Department of Environmental Conservation and other agencies. The firm is currently representing QWDC in connection with all aspects of remediation of legacy contamination from the area’s long and varied industrial uses, including remedies under auspices of either the State’s Voluntary Cleanup Program or the Brownfield Cleanup Program.<br/><br/>', 'Queens West', 'Long Island City , NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.704587,-74.000816);
    var marker = createMarker(point, "developmentmarker", getPopupContent('fpo.jpg',280,80, 'SPR is serving as environmental and regulatory counsel to the New York City Economic Development Corporation in connection with its East River Waterfront Development Study, which is focused on redeveloping and increasing waterfront access along the East River between Battery Park and the East River Park.<br/><br/>', 'East River Water Front', 'New York, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.6894501,-74.016792);
    var marker = createMarker(point, "developmentmarker", getPopupContent('governors_island_1_t.jpg',150,90, 'The Empire State Development Corporation and Governors Island Preservation and Education Corporation (GIPEC) have retained SPR to serve as counsel in connection with the environmental review of the development plan for Governors Island. This representation follows SPR’s prior representation of the United States Department of General Services in connection with the Generic EIS prepared in connection with the United States’ sale of the island to the State of New York.<br/><br/>', 'Governors Island', 'Governors Island, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.71148,-74.015825);
    var marker = createMarker(point, "developmentmarker", getPopupContent('battery_park_t.jpg',91,120, 'The New York State Urban Development Corporation (now the Empire State Development Corporation) retained SPR to provide legal advice in connection with the environmental review that led to the development of Battery Park City.<br/><br/>', 'Battery Park City', 'New York, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.757616,-74.002943);
    var marker = createMarker(point, "developmentmarker", getPopupContent('javits_t.jpg',150,90, 'SPR is currently representing the Javits Convention Center in connection with its proposal to expand the center. SPR served as environmental counsel in connection with the environmental review of the original Javits Center, and reprises that role for the proposed expansion.<br/><br/>', 'Javits Center', 'New York, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.765591,-73.997726);
    var marker = createMarker(point, "developmentmarker", getPopupContent('hudson_river_1_t.jpg',45,120, 'SPR represented the Hudson River Park Trust (and predecessor entities) in connection with the environmental review conducted in connection with the development of the Hudson River Park in Manhattan. SPR served as environmental counsel in connection with the Environmental Impact Statement required for the Park, and worked with State and local agencies in connection with the development of this exciting new park along the Hudson River waterfront. SPR continues to serve as counsel to the Hudson River Park Trust as it implements its overall plan for the park.<br/><br/>', 'Hudson River Park Trust', 'New York, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.772721,-73.984169);
    var marker = createMarker(point, "developmentmarker", getPopupContent('lincoln_center_3_t.jpg',150,110, 'SPR is assisting Lincoln Center by serving as environmental counsel in connection with its proposed expansion.<br/><br/>', 'Lincoln Center', 'New York, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.776902,-73.990517);
    var marker = createMarker(point, "developmentmarker", getPopupContent('riverside_park_t.jpg',90,120, 'SPR was lead environmental counsel for the preparation of the Environmental Impact Statement for the Riverside South project, a General Large-Scale Development located along Manhattan’s West Side between West 59th Street and West 72nd Street. This project, developed by Donald Trump, was approved by the City of New York in 1992. Since that time, SPR has continued to represent the developer, successfully defending a number of challenges to the project brought in both New York State and federal courts.<br/><br/>', 'Riverside South', 'New York, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.743290,-74.007769);
    var marker = createMarker(point, "brownfieldsmarker", getPopupContent('georgetown_t.jpg', 160, 120, 'SPR represented the Georgetown Company, the developer of IAC Corporation’s new corporate headquarters building -- the first building in New York designed by Frank Gehry -- which was built on a portion of the former Con Edison 18th Street Gas Works. The firm’s representation on this project included negotiating an allocation of responsibility among all stake-holders for the environmental remediation of residual contamination from decades of manufactured gas production and assorted waterfront industrial uses. SPR negotiated a Voluntary Cleanup Agreement with the State of New York, and subsequently assisted Georgetown in becoming one of the first Volunteers to participate in and receive a Certificate of Completion of the then newly enacted Brownfields Cleanup Program.  SPR also negotiated a transfer of risk with the contractor conducting the site cleanup, backed by environmental insurance.<br/><br/>', 'Georgetown Company', 'New York, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.749338,-73.955154);
    var marker = createMarker(point, "brownfieldsmarker", getPopupContent('river_east_3_t.jpg', 150, 120, 'The firm is representing the developer of the River East project, a 1.2-million-square-foot residential and commercial project in Long Island City. SPR has helped to secure the necessary tidal wetlands permits, contaminated soil remediation plan and other regulatory approvals that authorize the construction of two planned 30-story glass towers, four 8-story buildings and a waterfront public park that local residents say will greatly enhance their community.<br/><br/>', 'River East Project', 'New York, NY'))
    map.addOverlay(marker);

//		  var point = new GLatLng(40.805126,-73.939214);
//		  var marker = createMarker(point, "brownfieldsmarker", getPopupContent('harlem_hotel_t.jpg',90,120, 'Located on the southeast corner of 125th Street and Park Avenue, and designed by world-renowned architect, Enrique Norton, Harlem Park is a proposed $236 million, mixed-use residential and commercial development that will also be the first new hotel built in Harlem in decades - a 208-room Marriott Courtyard. On behalf of co-developers Majic Development Group and 1800 Park Ave. LLC, SPR was instrumental in securing the Brownfields Cleanup Agreement with the State of New York that is a driving force behind this redevelopment.<br/><br/>', 'Harlem Park', 'New York, NY'))
//	      map.addOverlay(marker);

    var point = new GLatLng(40.756054,-73.986951);
    var marker = createMarker(point, "municipalmarker", getPopupContent('fpo.jpg', 280, 80, 'SPR serves as environmental counsel to the Empire State Development Corporation and the New York City Economic Development Corporation. It provides advice on a number of development projects and other matters throughout New York City and New York State. For further information on the ESDC, please visit <a href="http://www.empire.state.ny.us/default.asp" style="color:black;">http://www.empire.state.ny.us/default.asp</a>.<br/><br/>', 'Empire State Development Corporation', 'New York, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.7581295, -73.8430994);
    var marker = createMarker(point, "developmentmarker", getPopupContent('willets_point.jpg',150,97, 'SPR was retained by the New York City Economic Development Corporation (EDC) to serve as environmental counsel for the preparation of a Generic Environmental Impact Statement for the City of New York’s proposed redevelopment of a 61 acre parcel in Willets Point Queens.  The Willets Point project is a proposed redevelopment of a substandard and underutilized industrial area into a lively, mixed-use, sustainable community and regional destination.  Besides the GEIS, the Firm assisted the City in other aspects of the proposed project, including hazardous waste remediation and environmental issues relating to the purchase of existing parcels within the project area and the parcels to be utilized to relocate existing businesses.  The project, which required the rezoning of the area and adoption of an urban renewal plan, was approved in the Fall of 2008.<br/><br/>', 'Willets Point Development Project', 'Willets Point, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.808224,-73.961889);
    var marker = createMarker(point, "developmentmarker", getPopupContent('columbia_university.jpg',180,116, 'SPR represents the Empire State Development Corporation (ESDC), an involved agency in the environmental review of the rezoning of a 35-acre portion of Manhattanville in West Harlem, a rezoning which facilitates Columbia University’s proposed expansion on 17 of the 35 acres.  The Columbia University development would create a new, 6.8 million square foot graduate campus in West Harlem that is to include state-of-the-art educational and academic research facilities, publicly-accessible open space, and other significant elements.  SPR assisted in the preparation of the rezoning’s environmental impact statement and ESDC’s General Project Plan pertaining to the Columbia project, and continues to be involved in litigation brought to challenge the project.<br/><br/>', 'Columbia University Manhattanville Expansion', 'New York, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.73558,-74.172247);
    var marker = createMarker(point, "municipalmarker", getPopupContent('newark.jpg',100,154, 'SPR advised the Port Authority of New York and New Jersey with regard to the preparation of the Environmental Impact Statement for the construction of a monorail system that connects the Northeast Corridor rail lines with the New Liberty Airport main terminal and long term parking areas.  The EIS was issued by the Federal Aviation Administration and the monorail was constructed.<br/><br/>', 'Newark Light Rail Project ', 'Newark, NJ'))
    map.addOverlay(marker);

    var point = new GLatLng(40.715973,-73.967342);
    var marker = createMarker(point, "developmentmarker", getPopupContent('domino.jpg',100,121, 'The Firm represents The Refinery, LLC, the developer of the former Domino Sugar facility on the East River in Brooklyn, with regard to waterfront permitting.  The proposed development involves construction of new buildings that will include up to 120,000 gross square feet (gsf) of retail/commercial space, up to 100,000 gsf of community facility use, and up to 2,400 residential units (2.64 million gsf). Thirty (30) percent of the units will be offered as affordable housing.   In addition, the project includes development of approximately 4.1 acres of public open space including an approximately 1-acre lawn at the center of the site and a waterfront esplanade along the East River.<br/><br/>', 'Refinery LLC &mdash; Redevelopment of Former Domino Sugar Factory, Brooklyn, New York', 'Brooklyn, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.701766,-74.011245);
    var marker = createMarker(point, "developmentmarker", getPopupContent('battery_maritime.jpg',180,135, 'SPR represents Dermot BMB, LLC, with respect to the proposed renovation and expansion of the historic Battery Maritime Building in lower Manhattan.  The proposal would create public indoor space, a boutique hotel, and a rooftop bar and restaurant.  SPR is assisting the developer in securing permits from the New York State Department of Environmental Conservation and the U.S. Army Corps of Engineers.<br/><br/>', 'Battery Maritime Building Redevelopment &mdash; Manhattan', 'New York, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.734524,-73.838577);
    var marker = createMarker(point, "developmentmarker", getPopupContent('sky_view_parc.jpg',150,96, 'SPR represents the Muss Development Corporation with respect to the development of SkyViewParc, a mixed-use development located on the former Flushing Industrial Park site.  SPR assisted with all aspects of the client’s application to clean up the property under the auspices of the New York State Brownfield Cleanup Program, including preparation of the initial application, revisions, submission of reports and all other aspects of this State-supervised cleanup.  SPR has also assisted the developer in seeking cost recovery from the former owner of the property responsible for the contamination.<br/><br/>', 'Muss Development Corporation &mdash; Sky View Parc', 'New York, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.642481,-73.788071);
    var marker = createMarker(point, "developmentmarker", getPopupContent('airtrain.jpg',180,109, 'SPR advised the Port Authority of New York and New Jersey with regard to the preparation of the Environmental Impact Statement for the construction of the JFK Airtrain, which runs from Jamaica Queens (where it connects with the LIRR and NYC Subway) to the main terminals at JFK aiport.  The EIS was issued by the Federal Aviation Administration and the Airtrain was constructed.<br/><br/>', 'JFK Airtrain', 'New York, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.7535661, -74.0035885);
    var marker = createMarker(point, "developmentmarker", getPopupContent('fpo.jpg', 280, 80, 'SPR is representing Hudson Yards Development Corp. with respect to the environmental review of the proposal by the Related Companies to develop residential and commercial buildings and significant public open space over the western portion of the John D. Caemmerer West Side Storage Yard, used by Long Island Rail Yard.  SPR’s representation to date includes advising HYDC and the City with respect to the appropriate contents of the Environmental Impact Statement for the project, which is currently in progress. <br/><br/>', 'Western Rail Yards', 'New York, NY'))
    map.addOverlay(marker);



    }
//
//LI REGION//////////////////////////////////////////////////////////////////////////////
//
if(mapArea == MAP_AREA_LI){

    var point = new GLatLng(40.679961,-73.584222);
    var marker = createMarker(point, "municipalmarker", getPopupContent('roosvelt_union_t.jpg',150,110, 'SPR served as environmental counsel to the Roosevelt Union Free School District with respect to its District-Wide Improvement Program, which is designed to relieve severe overcrowding, degraded physical conditions and inadequate and deficient equipment in the District&#39;s schools and to provide District students with equal educational opportunities. The Program includes the construction of three new elementary schools and a separate middle school, and the renovation and expansion of the existing junior-senior high school to a high school-only facility, as well as the introduction of a pre-kindergarten program into each of the elementary schools. SPR represented the District throughout the environmental review process for the Program, which included assistance in the retention of consultants, preparation of environmental documentation for the SEQRA process, including the preparation of an EIS and SEQRA Findings, and presentations at public hearings. The environmental review process culminated with the District&#39;s voters approving the Program through a bond referendum held in April 2004.  A number of the proposed schools have been completed and the entire Program is anticipated to be completed in 2009.<br/><br/>', 'Roosevelt Union School District', 'Roosevelt, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(40.941128,-72.681491);
    var marker = createMarker(point, "developmentmarker", getPopupContent('traditional_links_t.jpg',93,120, 'SPR provided legal advice in connection with the preparation of an Environmental Impact Statement for the proposed Traditional Links golf course in Riverhead, New York. SPR also assisted in connection with related permits and approvals required to construct this world-class golf course in Long Island.<br/><br/>', 'Traditional Links Golf Course', 'Riverhead, New York'))
    map.addOverlay(marker);

    var point = new GLatLng(40.943898,-72.300296);
    var marker = createMarker(point, "municipalmarker", getPopupContent('lipa.jpg',300,153, 'SPR is environmental counsel to the Long Island Power Authority (LIPA) and represented LIPA in connection with the preparation of an Environmental Impact Statement for the construction of a transmission line between the LIPA substations located in Southampton and Bridgehampton on the East End of Long Island.   The project, which also included an expansion of the Bridgehampton substation, was controversial because of the proposal to install part of the line aboveground on poles installed along the route of existing overhead distribution lines.  SPR led the EIS project team and defended LIPA when its project approval was challenged in New York State Supreme Court.  The matter was successfully resolved when LIPA and the Town of Southampton entered into an agreement on a funding mechanism to permit the entire installation of the line underground without burdening LIPA ratepayers as a whole with the expense for that additional work.<br/><br/>', 'LIPA &mdash; Southampton to Bridgehampton Transmission Line Project', 'Bridgehampton, New York'))
    map.addOverlay(marker);


    }
//
//UPSTATE REGION///////////////////////////////////////////////////////////////////////////////////
//
if(mapArea == MAP_AREA_UPSTATE){

    var point = new GLatLng(41.2376671,-74.1944529);
    var marker = createMarker(point, "developmentmarker", getPopupContent('tuxedo_reserve_t.jpg',217,120, 'SPR served as environmental counsel to the Related Companies in connection with the Tuxedo Reserve project, a planned residential and mixed-use project on 2,374 acres, primarily in the Town of Tuxedo in Orange County, New York. SPR provided legal advice in connection with the preparation of the Environmental Impact Statement and Supplemental Environmental Impact prepared for this project, which originally contemplated the construction of over 2,000 dwelling units and over 500,000 square feet of commercial space. SPR also provided advice on a variety of zoning and permitting issues relating to this project.<br/><br/>', 'Tuxedo Reserve', 'Tuxedo, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(41.07,-73.9);
    var marker = createMarker(point, "developmentmarker", getPopupContent('ny_thruway.jpg',150,90, 'SPR represents the New York State Thruway Authority, which together with the Metro North Railroad, a subsidiary of the Metropolitan Transportation Authority, is undertaking the Tappan Zee Bridge/I287 Corridor environmental review. This process will address the possible replacement of the Tappan Zee Bridge. The Firm is advising the Project Sponsors with regard to the environmental review of the proposal pursuant to both NEPA and SEQRA, as well as to environmental permitting and related requirements.<br/><br/>', 'New York State Thruway Authority - Tappan Zee Corridor', 'Tappan Zee, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(41.092449,-73.862457);
    var marker = createMarker(point, "brownfieldsmarker", getPopupContent('roseland_t.gif', 150, 120, 'SPR represents Roseland/Sleepy Hollow, LLC, as affiliate of Roseland Properties, the developer of the former General Motors Assembly site in Sleepy Hollow. The proposed Lighthouse Landing development is a mixed-use project, including residential, commercial and open space uses on a 97-acre site former industrial property bordering the Hudson River. The Firm has advised Roseland with respect to its participation in the Brownfield Cleanup Program and its proposed investigation and remediation of this former industrial site. In addition to the Brownfield work SPR is also assisting with environmental permitting issues, especially those pertinent to shoreline development, as well as preparation of an EIS.<br/><br/>', 'Roseland/Sleepy Hollow, LLC - Lighthouse Landing', 'Sleepy Hollow, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(41.159306,-73.764588);
    var marker = createMarker(point, "municipalmarker", getPopupContent('chappaqua_t.jpg',150,120, 'SPR served as environmental counsel to the Chappaqua Central School District with respect to its construction of a new 750-student middle school, as well as additions and renovations to two existing District schools. SPR represented the District throughout the environmental review process, including retention of consultants, preparation of environmental documentation, including an EIS and SEQRA Findings, and presentations at public hearings. In addition, SPR assisted the District in obtaining approvals from the New York City Department of Environmental Protection required for construction within the New York City watershed. The Firm also successfully defended the District in litigation challenging its approval of the new middle school. The new school opened in October 2003.<br/><br/>', 'Chappaqua Central School District', 'Chappaqua, NY'))
    map.addOverlay(marker);

    var point = new GLatLng(41.202243,-73.726177);
    var marker = createMarker(point, "developmentmarker", getPopupContent('westchester_hospital_t.jpg',150,105, 'SPR is representing Northern Westchester Hospital in Mount Kisco New York in obtaining rezoning and site plan approvals for its proposed expansion of the hospital and construction of a 57,000 square foot medical office building. The firm is coordinating the preparation of the scope and other supporting documents for the project’s SEQRA review, and working with the involved agencies to obtain other required approvals. This includes the acceptance of a Stormwater Pollution Prevention Plan by the New York City Department of Environmental Protection, which has authority because of the project’s location in the City’s Croton Water Supply System watershed.<br/><br/>', 'Northern Westchester Hospital', 'Mount Kisco, NY'))
    map.addOverlay(marker);


    }

}

// display a warning if the browser was not compatible
else {
    alert("Sorry, the Google Maps API is not compatible with this browser");
    }

// This Javascript is based on code provided by the
// Blackpool Community Church Javascript Team
// http://www.commchurch.freeserve.co.uk/
// http://econym.googlepages.com/index.htm

// Modified by TGP Associates, Inc

}
