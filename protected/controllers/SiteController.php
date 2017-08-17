<?php

class SiteController extends Controller
{
    /**
     * Declares class-based actions.
     */
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
                'foreColor' => 0xd71423,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    public function actionIndex()
    {
    	//Yii::app()->user->setFlash('success', "Чтобы закончить регистрацию, проверьте почту");

    	$addresses = Address::model()->findAll();
    	$mainsections = Mainsection::model()->findAll();
    	$mainfacts = Mainfact::model()->findAll();

    	$cnt = ceil(count($mainfacts) / 2);

    	$mainfacts1 = array();
    	$mainfacts2 = array();

    	for ($i = 0; $i < $cnt; $i++) {
    		$mainfacts1[] = $mainfacts[$i];
    	}

    	for ($i = $cnt; $i < count($mainfacts); $i++) {
    		$mainfacts2[] = $mainfacts[$i];
    	}

    	$mainworks = Mainwork::model()->findAll();

    	$features = Feature::model()->findAll();

        $this->render('index', array(
        	'addresses' => $addresses,
        	'mainsections' => $mainsections,
        	'mainfacts1' => $mainfacts1,
        	'mainfacts2' => $mainfacts2,
        	'mainworks' => $mainworks,
        	'features' => $features,
        ));
    }


    public function actionAbout()
    {
    	$addresses = Address::model()->findAll();
    	$people = People::model()->findAll();

        $this->render('about', array(
        	'addresses' => $addresses,
        	'people' => $people,
        ));
    }

    public function actionContacts()
    {
    	$addresses = Address::model()->findAll();

        $this->render('contacts', array(
        	'addresses' => $addresses,
        ));
    }

    public function actionDelivery()
    {
    	$addresses = Address::model()->findAll();

        $this->render('delivery', array(
        	'addresses' => $addresses,
        ));
    }

    public function actionPay()
    {
    	$addresses = Address::model()->findAll();

        $this->render('pay', array(
        	'addresses' => $addresses,
        ));
    }

    public function actionFaq()
    {
    	$addresses = Address::model()->findAll();
    	$faq = Faq::model()->findAll();

        $this->render('faq', array(
        	'addresses' => $addresses,
        	'faq' => $faq,
        ));
    }

    public function actionArticles()
    {
    	$addresses = Address::model()->findAll();
    	$articles = Article::model()->findAll();

        $this->render('articles', array(
        	'addresses' => $addresses,
        	'articles' => $articles,
        ));
    }

    public function actionArticle($id)
    {
    	$addresses = Address::model()->findAll();
    	$a = Article::model()->findByPk($id);

    	if (!$a) {
    		$this->redirect('/');
    	}

        $this->render('article', array(
        	'addresses' => $addresses,
        	'a' => $a,
        ));
    }

    public function actionItems()
    {
    	$addresses = Address::model()->findAll();
    	$items = Item::model()->findAll();

        $this->render('items', array(
        	'addresses' => $addresses,
        	'items' => $items,
        ));
    }

    public function actionReviews()
    {
    	$addresses = Address::model()->findAll();
    	$reviews = Review::model()->findAll();

        $this->render('reviews', array(
        	'addresses' => $addresses,
        	'reviews' => $reviews,
        ));
    }



    public function actionCategory($id)
    {
    	$c = Category::model()->findByPk($id);
    	$addresses = Address::model()->findAll();

    	if (!$c) {
    		$this->redirect('/');
    	}

    	$childs = Category::model()->findAllByAttributes(array(
    		'parent_id' => $c->id,
    	));

    	$catalog = Catalog::model()->findAllByAttributes(array(
    		'category_id' => $c->id,
    	));

        $this->render('category', array(
        	'c' => $c,
        	'childs' => $childs,
        	'addresses' => $addresses,
        	'catalog' => $catalog,
        ));
    }



    public function actionCatalog()
    {
    	$addresses = Address::model()->findAll();

    	$alias1 = Yii::app()->request->getQuery('alias1', '');
    	$alias2 = Yii::app()->request->getQuery('alias2', '');
    	$alias3 = Yii::app()->request->getQuery('alias3', '');
    	

    	if (empty($alias3) && empty($alias2)) {

    		if (empty($alias1))
    			$this->redirect('/');

    		$c = Category::model()->findByAttributes(array(
    			'alias' => $alias1,
    		));

	    	if (!$c) {
	    		$this->redirect('/');
	    	}
	
	    	$childs = Category::model()->findAllByAttributes(array(
	    		'parent_id' => $c->id,
	    	));

	    	$catalog = Catalog::model()->findAllByAttributes(array(
	    		'category_id' => $c->id,
	    	));

	        $this->render('category', array(
	        	'c' => $c,
	        	'childs' => $childs,
	        	'addresses' => $addresses,
	        	'catalog' => $catalog,
	        ));

		} elseif (empty($alias3)) {

			if (empty($alias1))
    			$this->redirect('/');

			if (empty($alias2))
    			$this->redirect('/');


			$c = Catalog::model()->findByAttributes(array(
				'alias' => $alias2,
			));

	    	if ($c) {

		        $this->render('catalog', array(
		        	'c' => $c,
		        	'addresses' => $addresses,
		
		        ));
			} else {

				$c = Category::model()->findByAttributes(array(
	    			'alias' => $alias2,
	    		));

		    	if (!$c) {
		    		$this->redirect('/');
		    	}
	
		    	$childs = Category::model()->findAllByAttributes(array(
		    		'parent_id' => $c->id,
		    	));

		    	$catalog = Catalog::model()->findAllByAttributes(array(
		    		'category_id' => $c->id,
		    	));

		        $this->render('category', array(
		        	'c' => $c,
		        	'childs' => $childs,
		        	'addresses' => $addresses,
		        	'catalog' => $catalog,
		        ));

			}

    		
		} elseif (!empty($alias3) && !empty($alias2) && !empty($alias1)) {

			$c = Catalog::model()->findByAttributes(array(
				'alias' => $alias3,
			));

	    	if ($c) {

		        $this->render('catalog', array(
		        	'c' => $c,
		        	'addresses' => $addresses,
		
		        ));
			} else {
				$this->redirect('/');
			}
			
    	} else {

    		$this->redirect('/');

		}
    }




    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionTest()
    {
    	die;
    	Mailer::send("src_mail@mail.ru", "Регистрация на сайте", "test tes");

    	die;
    	set_time_limit(0);
    }
}