<?php
	//include all DAO files
	set_include_path('.;C:\xampp\htdocs\Zend\Dekens');
	//set_include_path('.;/home/wimbogp45/domains/dekens-agritechnics.be/public_html');
	require_once('_/components/sql/Connection.class.php');
	require_once('_/components/sql/ConnectionFactory.class.php');
	require_once('_/components/sql/ConnectionProperty.class.php');
	require_once('_/components/sql/QueryExecutor.class.php');
	require_once('_/components/sql/Transaction.class.php');
	require_once('_/components/sql/SqlQuery.class.php');
	require_once('_/components/core/ArrayList.class.php');
	require_once('_/components/dao/DAOFactory.class.php');
 	
	//av
	require_once('_/components/dto/AvDaysOpen.class.php');
	require_once('_/components/dao/AvDaysOpenDAO.class.php');
	require_once('_/components/mysql/AvDaysOpenMySqlDAO.class.php');
	require_once('_/components/mysql/ext/AvDaysOpenMySqlExtDAO.class.php');
	require_once('_/components/dto/AvDaysClosed.class.php');
	require_once('_/components/dao/AvDaysClosedDAO.class.php');
	require_once('_/components/mysql/AvDaysClosedMySqlDAO.class.php');
	require_once('_/components/mysql/ext/AvDaysClosedMySqlExtDAO.class.php');
	require_once('_/components/dto/AvDaysHours.class.php');
	require_once('_/components/dao/AvDaysHoursDAO.class.php');
	require_once('_/components/mysql/AvDaysHoursMySqlDAO.class.php');
	require_once('_/components/mysql/ext/AvDaysHoursMySqlExtDAO.class.php');
	require_once('_/components/dto/AvInformation.class.php');
	require_once('_/components/dao/AvInformationDAO.class.php');
	require_once('_/components/mysql/AvInformationMySqlDAO.class.php');
	require_once('_/components/mysql/ext/AvInformationMySqlExtDAO.class.php');
	
	//content
	require_once('_/components/dto/ContentFrontPage.class.php');
	require_once('_/components/dao/ContentFrontPageDAO.class.php');
	require_once('_/components/mysql/ContentFrontPageMySqlDAO.class.php');
	require_once('_/components/mysql/ext/ContentFrontPageMySqlExtDAO.class.php');
	require_once('_/components/dao/RentalDAO.class.php');
	require_once('_/components/mysql/RentalMySqlDAO.class.php');
	require_once('_/components/mysql/ext/RentalMySqlExtDAO.class.php');
	require_once('_/components/dto/Rental.class.php');
	require_once('_/components/dao/SecondHandDAO.class.php');
	require_once('_/components/mysql/SecondHandMySqlDAO.class.php');
	require_once('_/components/mysql/ext/SecondHandMySqlExtDAO.class.php');
	require_once('_/components/dto/SecondHand.class.php');
	require_once('_/components/dao/BannerDAO.class.php');
	require_once('_/components/dto/Banner.class.php');
	require_once('_/components/mysql/BannerMySqlDAO.class.php');
	require_once('_/components/mysql/ext/BannerMySqlExtDAO.class.php');
	require_once('_/components/dao/BannerclientDAO.class.php');
	require_once('_/components/dto/Bannerclient.class.php');
	require_once('_/components/mysql/BannerclientMySqlDAO.class.php');
	require_once('_/components/mysql/ext/BannerclientMySqlExtDAO.class.php');
	require_once('_/components/dao/BannerfinishDAO.class.php');
	require_once('_/components/dto/Bannerfinish.class.php');
	require_once('_/components/mysql/BannerfinishMySqlDAO.class.php');
	require_once('_/components/mysql/ext/BannerfinishMySqlExtDAO.class.php');
	require_once('_/components/dao/CategoriesDAO.class.php');
	require_once('_/components/dto/Categorie.class.php');
	require_once('_/components/mysql/CategoriesMySqlDAO.class.php');
	require_once('_/components/mysql/ext/CategoriesMySqlExtDAO.class.php');
	require_once('_/components/dao/CommentDAO.class.php');
	require_once('_/components/dto/Comment.class.php');
	require_once('_/components/mysql/CommentMySqlDAO.class.php');
	require_once('_/components/mysql/ext/CommentMySqlExtDAO.class.php');
	require_once('_/components/dao/ComponentsDAO.class.php');
	require_once('_/components/dto/Component.class.php');
	require_once('_/components/mysql/ComponentsMySqlDAO.class.php');
	require_once('_/components/mysql/ext/ComponentsMySqlExtDAO.class.php');
	require_once('_/components/dao/ContactDetailsDAO.class.php');
	require_once('_/components/dto/ContactDetail.class.php');
	require_once('_/components/mysql/ContactDetailsMySqlDAO.class.php');
	require_once('_/components/mysql/ext/ContactDetailsMySqlExtDAO.class.php');
	require_once('_/components/dao/ContainersDAO.class.php');
	require_once('_/components/dto/Container.class.php');
	require_once('_/components/mysql/ContainersMySqlDAO.class.php');
	require_once('_/components/mysql/ext/ContainersMySqlExtDAO.class.php');
	require_once('_/components/dao/ContentDAO.class.php');
	require_once('_/components/dto/Content.class.php');
	//require_once('_/components/mysql/ContentMySqlDAO.class.php');
	//require_once('_/components/mysql/ext/ContentMySqlExtDAO.class.php');
	//require_once('_/components/dao/ContentFrontpageDAO.class.php');
	//require_once('_/components/dto/ContentFrontpage.class.php');
	//require_once('_/components/mysql/ContentFrontpageMySqlDAO.class.php');
	//require_once('_/components/mysql/ext/ContentFrontpageMySqlExtDAO.class.php');
	require_once('_/components/dao/ContentRatingDAO.class.php');
	require_once('_/components/dto/ContentRating.class.php');
	require_once('_/components/mysql/ContentRatingMySqlDAO.class.php');
	require_once('_/components/mysql/ext/ContentRatingMySqlExtDAO.class.php');
	require_once('_/components/dao/CoreAclAroDAO.class.php');
	require_once('_/components/dto/CoreAclAro.class.php');
	require_once('_/components/mysql/CoreAclAroMySqlDAO.class.php');
	require_once('_/components/mysql/ext/CoreAclAroMySqlExtDAO.class.php');
	require_once('_/components/dao/CoreAclAroGroupsDAO.class.php');
	require_once('_/components/dto/CoreAclAroGroup.class.php');
	require_once('_/components/mysql/CoreAclAroGroupsMySqlDAO.class.php');
	require_once('_/components/mysql/ext/CoreAclAroGroupsMySqlExtDAO.class.php');
	require_once('_/components/dao/CoreAclAroSectionsDAO.class.php');
	require_once('_/components/dto/CoreAclAroSection.class.php');
	require_once('_/components/mysql/CoreAclAroSectionsMySqlDAO.class.php');
	require_once('_/components/mysql/ext/CoreAclAroSectionsMySqlExtDAO.class.php');
	require_once('_/components/dao/CoreAclGroupsAroMapDAO.class.php');
	require_once('_/components/dto/CoreAclGroupsAroMap.class.php');
	require_once('_/components/mysql/CoreAclGroupsAroMapMySqlDAO.class.php');
	require_once('_/components/mysql/ext/CoreAclGroupsAroMapMySqlExtDAO.class.php');
	require_once('_/components/dao/GroupsDAO.class.php');
	require_once('_/components/dto/Group.class.php');
	require_once('_/components/mysql/GroupsMySqlDAO.class.php');
	require_once('_/components/mysql/ext/GroupsMySqlExtDAO.class.php');
	require_once('_/components/dao/LanguageDAO.class.php');
	require_once('_/components/dto/Language.class.php');
	require_once('_/components/mysql/LanguageMySqlDAO.class.php');
	require_once('_/components/mysql/ext/LanguageMySqlExtDAO.class.php');
	require_once('_/components/dao/MambotsDAO.class.php');
	require_once('_/components/dto/Mambot.class.php');
	require_once('_/components/mysql/MambotsMySqlDAO.class.php');
	require_once('_/components/mysql/ext/MambotsMySqlExtDAO.class.php');
	require_once('_/components/dao/MenuDAO.class.php');
	require_once('_/components/dto/Menu.class.php');
	require_once('_/components/mysql/MenuMySqlDAO.class.php');
	require_once('_/components/mysql/ext/MenuMySqlExtDAO.class.php');
	require_once('_/components/dao/MessagesDAO.class.php');
	require_once('_/components/dto/Message.class.php');
	require_once('_/components/mysql/MessagesMySqlDAO.class.php');
	require_once('_/components/mysql/ext/MessagesMySqlExtDAO.class.php');
	require_once('_/components/dao/MessagesCfgDAO.class.php');
	require_once('_/components/dto/MessagesCfg.class.php');
	require_once('_/components/mysql/MessagesCfgMySqlDAO.class.php');
	require_once('_/components/mysql/ext/MessagesCfgMySqlExtDAO.class.php');
	require_once('_/components/dao/ModulesDAO.class.php');
	require_once('_/components/dto/Module.class.php');
	require_once('_/components/mysql/ModulesMySqlDAO.class.php');
	require_once('_/components/mysql/ext/ModulesMySqlExtDAO.class.php');
	require_once('_/components/dao/ModulesMenuDAO.class.php');
	require_once('_/components/dto/ModulesMenu.class.php');
	require_once('_/components/mysql/ModulesMenuMySqlDAO.class.php');
	require_once('_/components/mysql/ext/ModulesMenuMySqlExtDAO.class.php');
	require_once('_/components/dao/NewsfeedsDAO.class.php');
	require_once('_/components/dto/Newsfeed.class.php');
	require_once('_/components/mysql/NewsfeedsMySqlDAO.class.php');
	require_once('_/components/mysql/ext/NewsfeedsMySqlExtDAO.class.php');
	require_once('_/components/dao/ParametersDAO.class.php');
	require_once('_/components/dto/Parameter.class.php');
	require_once('_/components/mysql/ParametersMySqlDAO.class.php');
	require_once('_/components/mysql/ext/ParametersMySqlExtDAO.class.php');
	require_once('_/components/dao/PlayersToTeamsDAO.class.php');
	require_once('_/components/dto/PlayersToTeam.class.php');
	require_once('_/components/mysql/PlayersToTeamsMySqlDAO.class.php');
	require_once('_/components/mysql/ext/PlayersToTeamsMySqlExtDAO.class.php');
	require_once('_/components/dao/PollDataDAO.class.php');
	require_once('_/components/dto/PollData.class.php');
	require_once('_/components/mysql/PollDataMySqlDAO.class.php');
	require_once('_/components/mysql/ext/PollDataMySqlExtDAO.class.php');
	require_once('_/components/dao/PollDateDAO.class.php');
	require_once('_/components/dto/PollDate.class.php');
	require_once('_/components/mysql/PollDateMySqlDAO.class.php');
	require_once('_/components/mysql/ext/PollDateMySqlExtDAO.class.php');
	require_once('_/components/dao/PollMenuDAO.class.php');
	require_once('_/components/dto/PollMenu.class.php');
	require_once('_/components/mysql/PollMenuMySqlDAO.class.php');
	require_once('_/components/mysql/ext/PollMenuMySqlExtDAO.class.php');
	require_once('_/components/dao/PollsDAO.class.php');
	require_once('_/components/dto/Poll.class.php');
	require_once('_/components/mysql/PollsMySqlDAO.class.php');
	require_once('_/components/mysql/ext/PollsMySqlExtDAO.class.php');
	require_once('_/components/dao/SectionsDAO.class.php');
	require_once('_/components/dto/Section.class.php');
	require_once('_/components/mysql/SectionsMySqlDAO.class.php');
	require_once('_/components/mysql/ext/SectionsMySqlExtDAO.class.php');
	require_once('_/components/dao/SessionDAO.class.php');
	require_once('_/components/dto/Session.class.php');
	require_once('_/components/mysql/SessionMySqlDAO.class.php');
	require_once('_/components/mysql/ext/SessionMySqlExtDAO.class.php');
	require_once('_/components/dao/TemplatePositionsDAO.class.php');
	require_once('_/components/dto/TemplatePosition.class.php');
	require_once('_/components/mysql/TemplatePositionsMySqlDAO.class.php');
	require_once('_/components/mysql/ext/TemplatePositionsMySqlExtDAO.class.php');
	require_once('_/components/dao/TemplatesMenuDAO.class.php');
	require_once('_/components/dto/TemplatesMenu.class.php');
	require_once('_/components/mysql/TemplatesMenuMySqlDAO.class.php');
	require_once('_/components/mysql/ext/TemplatesMenuMySqlExtDAO.class.php');

	require_once('_/components/dao/UserDAO.class.php');
	require_once('_/components/dto/User.class.php');
	require_once('_/components/mysql/UserMySqlDAO.class.php');
	require_once('_/components/mysql/ext/UserMySqlExtDAO.class.php');

	//require_once('_/components/dao/UsertypeDAO.class.php');
// 	require_once('_/components/dto/Usertype.class.php');
// 	require_once('_/components/mysql/UsertypeMySqlDAO.class.php');
// 	require_once('_/components/mysql/ext/UsertypeMySqlExtDAO.class.php');
	
	require_once('_/components/dao/WeblinksDAO.class.php');
	require_once('_/components/dto/Weblink.class.php');
	require_once('_/components/mysql/WeblinksMySqlDAO.class.php');
	require_once('_/components/mysql/ext/WeblinksMySqlExtDAO.class.php');

?>