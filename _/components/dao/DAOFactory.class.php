<?php

/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: ${date}
 */
class DAOFactory{
	
	
	/*
	 * @return RentalDAO
	*/
	public static function getContentFrontPageDAO(){
		return new ContentFrontPageMySqlExtDAO();
	}
	
	/*
	 * @return RentalDAO
	*/
	public static function getRentalDAO(){
		return new RentalMySqlExtDAO();
	}
	
	/*
	 * @return SecondHandDAO
	*/
	public static function getSecondHandDAO(){
		return new SecondHandMySqlExtDAO();
	}
	
	/*
	 * @return UserDAO
	 */
	public static function getUserDAO(){
		return new UserMySqlExtDAO();
	}

	/*
	 * @return LanguageDAO
	 */
	public static function getLanguageDAO(){
		return new LanguageMySqlExtDAO();
	}


	/*
	 * @return AnunciantesCatDAO
	 */
	public static function getAnunciantesCatDAO(){
		return new AnunciantesCatMySqlExtDAO();
	}

	/*
	 * @return BannerDAO
	 */
	public static function getBannerDAO(){
		return new BannerMySqlExtDAO();
	}

	/*
	 * @return BannerclientDAO
	 */
	public static function getBannerclientDAO(){
		return new BannerclientMySqlExtDAO();
	}

	/*
	 * @return BannerfinishDAO
	 */
	public static function getBannerfinishDAO(){
		return new BannerfinishMySqlExtDAO();
	}

	/*
	 * @return CategoriesDAO
	 */
	public static function getCategoriesDAO(){
		return new CategoriesMySqlExtDAO();
	}

	/*
	 * @return CommentDAO
	 */
	public static function getCommentDAO(){
		return new CommentMySqlExtDAO();
	}

	/*
	 * @return ComponentsDAO
	 */
	public static function getComponentsDAO(){
		return new ComponentsMySqlExtDAO();
	}

	/*
	 * @return ContactDetailsDAO
	 */
	public static function getContactDetailsDAO(){
		return new ContactDetailsMySqlExtDAO();
	}

	/*
	 * @return ContainersDAO
	 */
	public static function getContainersDAO(){
		return new ContainersMySqlExtDAO();
	}

	/*
	 * @return ContentDAO
	 */
	public static function getContentDAO(){
		return new ContentMySqlExtDAO();
	}

	/*
	 * @return ContentRatingDAO
	 */
	public static function getContentRatingDAO(){
		return new ContentRatingMySqlExtDAO();
	}

	/*
	 * @return CoreAclAroDAO
	 */
	public static function getCoreAclAroDAO(){
		return new CoreAclAroMySqlExtDAO();
	}

	/*
	 * @return CoreAclAroGroupsDAO
	 */
	public static function getCoreAclAroGroupsDAO(){
		return new CoreAclAroGroupsMySqlExtDAO();
	}

	/*
	 * @return CoreAclAroSectionsDAO
	 */
	public static function getCoreAclAroSectionsDAO(){
		return new CoreAclAroSectionsMySqlExtDAO();
	}

	/*
	 * @return CoreAclGroupsAroMapDAO
	 */
	public static function getCoreAclGroupsAroMapDAO(){
		return new CoreAclGroupsAroMapMySqlExtDAO();
	}

	/*
	 * @return GroupsDAO
	 */
	public static function getGroupsDAO(){
		return new GroupsMySqlExtDAO();
	}

	/*
	 * @return MambotsDAO
	 */
	public static function getMambotsDAO(){
		return new MambotsMySqlExtDAO();
	}

	/*
	 * @return MenuDAO
	 */
	public static function getMenuDAO(){
		return new MenuMySqlExtDAO();
	}

	/*
	 * @return MessagesDAO
	 */
	public static function getMessagesDAO(){
		return new MessagesMySqlExtDAO();
	}

	/*
	 * @return MessagesCfgDAO
	 */
	public static function getMessagesCfgDAO(){
		return new MessagesCfgMySqlExtDAO();
	}

	/*
	 * @return ModulesDAO
	 */
	public static function getModulesDAO(){
		return new ModulesMySqlExtDAO();
	}

	/*
	 * @return ModulesMenuDAO
	 */
	public static function getModulesMenuDAO(){
		return new ModulesMenuMySqlExtDAO();
	}

	/*
	 * @return NewsfeedsDAO
	 */
	public static function getNewsfeedsDAO(){
		return new NewsfeedsMySqlExtDAO();
	}

	/*
	 * @return ParametersDAO
	 */
	public static function getParametersDAO(){
		return new ParametersMySqlExtDAO();
	}

	/*
	 * @return PlayersToTeamsDAO
	 */
	public static function getPlayersToTeamsDAO(){
		return new PlayersToTeamsMySqlExtDAO();
	}

	/*
	 * @return PollDataDAO
	 */
	public static function getPollDataDAO(){
		return new PollDataMySqlExtDAO();
	}

	/*
	 * @return PollDateDAO
	 */
	public static function getPollDateDAO(){
		return new PollDateMySqlExtDAO();
	}

	/*
	 * @return PollMenuDAO
	 */
	public static function getPollMenuDAO(){
		return new PollMenuMySqlExtDAO();
	}

	/*
	 * @return PollsDAO
	 */
	public static function getPollsDAO(){
		return new PollsMySqlExtDAO();
	}

	/*
	 * @return SectionsDAO
	 */
	public static function getSectionsDAO(){
		return new SectionsMySqlExtDAO();
	}

	/*
	 * @return SessionDAO
	 */
	public static function getSessionDAO(){
		return new SessionMySqlExtDAO();
	}

	/*
	 * @return TemplatePositionsDAO
	 */
	public static function getTemplatePositionsDAO(){
		return new TemplatePositionsMySqlExtDAO();
	}

	/*
	 * @return TemplatesMenuDAO
	 */
	public static function getTemplatesMenuDAO(){
		return new TemplatesMenuMySqlExtDAO();
	}

	/*
	 * @return UsersDAO
	 */
	public static function getUsersDAO(){
		return new UsersMySqlExtDAO();
	}

	/*
	 * @return UsertypesDAO
	 */
	public static function getUsertypesDAO(){
		return new UsertypesMySqlExtDAO();
	}

	/*
	 * @return WeblinksDAO
	 */
	public static function getWeblinksDAO(){
		return new WeblinksMySqlExtDAO();
	}


}
?>