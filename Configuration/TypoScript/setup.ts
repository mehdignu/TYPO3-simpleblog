
plugin.tx_simpleblog_bloglisting {
  view {
    templateRootPaths.0 = EXT:simpleblog/Resources/Private/Templates/
    templateRootPaths.1 = plugin.tx_simpleblog_bloglisting.view.templateRootPath
    partialRootPaths.0 = EXT:simpleblog/Resources/Private/Partials/
    partialRootPaths.1 = plugin.tx_simpleblog_bloglisting.view.partialRootPath
    layoutRootPaths.0 = EXT:simpleblog/Resources/Private/Layouts/
    layoutRootPaths.1 = plugin.tx_simpleblog_bloglisting.view.layoutRootPath
  }
  persistence {
		# storagePid = 11,12,13,14
		storagePid = 9
		recursive = 1
		classes {
			Pluswerk\Simpleblog\Domain\Model\Blog {
				newRecordStoragePid = 11
			}
			Pluswerk\Simpleblog\Domain\Model\Post {
				newRecordStoragePid = 12
			}
			Pluswerk\Simpleblog\Domain\Model\Comment {
				newRecordStoragePid = 13
			}
			Pluswerk\Simpleblog\Domain\Model\Tag {
				newRecordStoragePid = 14
			}
			
		}
	}
	
	settings {
		loginpage = 8
		blog {
			max = 10
		}
}
  features {
    #skipDefaultArguments = 1
  }
  mvc {
    #callDefaultActionIfActionCantBeResolved = 1
  }
}

plugin.tx_simpleblog._CSS_DEFAULT_STYLE (
    textarea.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    input.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    .tx-simpleblog table {
        border-collapse:separate;
        border-spacing:10px;
    }

    .tx-simpleblog table th {
        font-weight:bold;
    }

    .tx-simpleblog table td {
        vertical-align:top;
    }

    .typo3-messages .message-error {
        color:red;
    }

    .typo3-messages .message-ok {
        color:green;
    }
)


page {
	includeCSS {
		bootstrap = EXT:simpleblog/Resources/Public/Bootstrap/css/bootstrap.min.css
		simpleblog = EXT:simpleblog/Resources/Public/Css/simpleblog.css
	}
	includeJSlibs {
		jquery = //code.jquery.com/jquery.js
		jquery.external = 1
		bootstrap = EXT:simpleblog/Resources/Public/Bootstrap/js/bootstrap.min.js
	}
}




	

