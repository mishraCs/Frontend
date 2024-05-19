<?php
// Include any necessary files or configurations here
// Get the requested URL
$url = $_SERVER["REQUEST_URI"];

// Split the URL into parts
$urlParts = explode("/", trim($url, "/"));

// Extract the ID and slug
$blogId = $urlParts[1]; // Assuming ID is the second part of the URL
// $slug = $urlParts[2];
// Assuming you have defined your API endpoint and blogId
$publicUrl = "https://api.newworldtrending.com/blog";
$imgUrl = "https://api.newworldtrending.com/blog/uploads/";
// Build the API URL
$apiUrl = "{$publicUrl}/get_blog_by_id/88";

// Function to fetch data from the API
function fetchDataFromApi($apiUrl)
{
    // Implement your API call logic here
    // Example using cURL:
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}

// Fetch data from the API
$blogData = fetchDataFromApi($apiUrl)["data"];
// echo '<pre>';
// var_dump($blogData);
// echo '</pre>';
// Handle 404 if the blog data is not found
if (empty($blogData)) {
    header("HTTP/1.0 404 Not Found");
    echo "404 Not Found";
    exit();
}

function titleToSlug($title) {
    // Convert to lowercase and replace spaces with dashes
    $slug = strtolower(str_replace(' ', '-', $title));

    // Remove special characters and non-alphanumeric characters
    $cleanSlug = preg_replace('/[^\w-]/', '', $slug);

    return $cleanSlug;
}



// Include any necessary HTML structure or common components

// Start HTML document
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $blogData["title"] ?> - newworldtrending</title>
    <!-- <meta name="description" content="<?= $blogData["description"] ?>"> -->
<!-- <link rel="canonical" href="<?= 'https://world.blog.newworldtrending.com/blog/' . $blogData['id'] . '/' . titleToSlug($blogData['title']) ?>" /> -->

    <!-- Logo -->
    <!-- Include your logo as needed -->

    <!-- Open Graph / Facebook -->
    <meta property="og:title" content="<?= $blogData[
        "title"
    ] ?> - newworldtrending" />
    <!-- <meta property="og:description" content="<?= $blogData["description"] ?>" /> -->
    <meta property="og:image" content="<?= $imgUrl .$blogData["banner"][0] ?>" />
    <meta property="og:url" content="<?= $blogData["facebookLink"] ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:article:author" content="<?= $blogData["author"] ?>" />

    <!-- Instagram -->
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?= $blogData[
        "title"
    ] ?> - newworldtrending" />
    <!-- <meta property="og:description" content="<?= $blogData["description"] ?>" /> -->
    <meta property="og:image" content="<?= $blogData["banner"][0] ?? "" ?>" />
    <meta property="og:url" content="<?= $blogData["instagramLink"] ?>" />
    <meta property="og:site_name" content="https://newworldtrending.com/" />

    <!-- Other meta tags -->
    <title><?= $blogData["title"] ?> - newworldtrending</title>
    <meta name="keywords" content="<?= implode(",", $blogData["tags"]) ?>" />
    <meta name="author" content="<?= $blogData["author"] ?>" />
    <meta name="robots" content="index, follow" />
     <link rel="shortcut icon" href="../../images/logo.jpeg" type="image/x-icon">
    
    
       <link
          rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
          crossOrigin="anonymous"
        ></link>
        <script
          src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
          crossOrigin="anonymous"
        ></script>
        <link
          rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
          integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd"
          crossOrigin="anonymous"
        ></link>
        <!-- Carousal Example  -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Add more meta tags as needed for SEO -->
</head>

<style>
    :root {
    --primary: #551A8B;
    /* Update primary color to a deep purple color */
    --secondary: #FFEB3B;
    /* Add a secondary color, in this case, a deep orange color */
}



h1,
h2,
h3 {
    color: var(--primary);
    /* Use the primary color for heading text */
}

p {
    color: #333;
    /* Set a dark text color for paragraphs */
}

a {
    color: var(--secondary);
    /* Use the secondary color for links */
    text-decoration: none;
    /* Remove default underline from links */
}

a:hover {
    text-decoration: underline;
    /* Add underline on hover for links */
}

.button {
    background-color: var(--primary);
    /* Use the primary color for button backgrounds */
    color: #fff;
    /* Set text color for buttons to white */
    padding: 10px 20px;
    /* Add padding to buttons for a comfortable look */
    border: none;
    /* Remove button border */
    cursor: pointer;
    /* Change cursor to pointer on hover for buttons */
    border-radius: 5px;
    /* Add border-radius for rounded corners on buttons */
}

.button:hover {
    background-color: #329e89;
    /* Darken the button color on hover */
}


/* Add more custom styles as needed */










a{
    color: rgb(85, 26, 139);
}

.blog-dtl-bg {
   
    padding: 10px;
}

.blg-dtl-boxvw {
    background-color: white;
    box-shadow: 2px 2px 40px 5px rgb(241, 241, 241);
    padding: 20px;
}

.h1-heading-fntsz {
    font-size: 30px;
    font-weight: 500;
    color: rgb(22, 22, 22);
    text-align: justify;
    letter-spacing: 0.75px;
}

.date-fntvw {
    font-size: 14px;
    font-weight: 500;
    letter-spacing: 0.75px;
    color: rgb(124, 124, 124);
}

.para-fnt-szvw {
    font-size: 16px;
    font-weight: 500;
    letter-spacing: 0.75px;
    color: rgb(83, 83, 83);
    margin-top: 15px;
    text-align: justify;
}

.h3-fntsz-heading {
    font-size: 21px;
    font-weight: 500;
    letter-spacing: 0.75px;
    margin-top: 15px;
}

table {
    width: 100%;
}

td,
th {
    border: solid 1px rgb(68, 67, 67);
    padding: 10px;
}

.table-hd-fntsz {
    font-size: 18px;
    font-weight: 500;
    letter-spacing: 0.75px;
    color: rgb(29, 29, 29);
}

.blg-dtl-img {
    width: 100%;
    height: 100%;
}

.blg-dtl-imgbx {
    width: 100%;
    max-width: 800px;
    height: 350px;
}

.search-blg-input {
    border: solid 1px rgb(173, 173, 173);
    padding: 10px;
    border-radius: 5px;
    font-size: 14px;
    font-weight: 500;
    letter-spacing: 0.75px;
    width: 100%;

}

.search-iconbox {
    background-color: var(--secondary);
    padding: 5px;
    border-radius: 5px;
    margin-left: 5px;
    width: 50px;
    color: white;
    text-align: center;
    cursor: pointer;
}

.h5-tag-fntsz {
    font-size: 20px;
    font-weight: 500;
    letter-spacing: 0.75px;
    color: rgb(24, 24, 24);
}

.linking-fnt-sz {
    font-size: 15px;
    font-weight: 500;
    letter-spacing: 0.75px;
    margin-top: 20px;
}

.check-label {
    font-size: 15px;
    font-weight: 500;
    letter-spacing: 0.75px;
    color: rgb(58, 57, 57)
}

.post-comment-btn {
    font-size: 16px;
    font-weight: 500;
    padding-left: 40px;
    padding-right: 40px;
    padding-top: 6px;
    padding-bottom: 6px;
    border: none;
    background-color: var(--secondary);
    color: rgb(255, 255, 255);
    margin-top: 20px;
    border-radius: 5px;
}

.social-icon-box {
    /* background-color: rgb(0, 0, 0);
    color: white; */

    border: solid 1px #FFEA00;
    
    width: 40px;

    text-align: center;
    border-radius: 2px;
    cursor: pointer;
}

.social-icon-box:hover {
    background-color: #FFFF00;
    color: white;
}

@media only screen and (max-width:767.99px) {
    .blg-dtl-boxvw {
        padding: 10px;
    }

    .h1-heading-fntsz {
        font-size: 22px;
    }

    .date-fntvw {
        font-size: 13px;

    }

    .blg-dtl-imgbx {
        height: auto;
    }

    .para-fnt-szvw {
        font-size: 15px;
    }

    .h3-fntsz-heading {
        font-size: 18px;
    }

    .h5-tag-fntsz {
        font-size: 17px;
    }

    .table-hd-fntsz {
        font-size: 16px;
    }

    .check-label {
        font-size: 12px;
    }

    .blog-dtl-bg {
        padding: 0px;
    }
}


.banner-img{
    /* max-width: 800px; */
    width: 100%;
    height: 400px;
    
    object-fit: contain;

}


.social-icon-outer{
    align-items: center;
    justify-content: center;
}





.gallery-container {
    padding-top: 0.9375rem;
}

.gallery-card {
    position: relative;
    overflow: hidden;
    margin-bottom: 1.875rem;
}

.gallery-thumbnail {
    width: 100%;
    object-fit: contain;
    height: auto;
    border-radius: 4px;
}

.card-icon-open {
    display: block;
    position: absolute;
    top: 50%;
    left: 50%;
    font-size: 2rem;
    color: #fff;
    cursor: pointer;
    opacity: 0;
    transform: translate(-50%, -50%);
    transition: all 0.25s ease-in-out;
}

.card-icon-open:focus,
.card-icon-open:hover {
    color: #111;
}

.gallery-thumbnail:focus~.card-icon-open,
.gallery-thumbnail:hover~.card-icon-open,
.gallery-thumbnail~.card-icon-open:focus,
.gallery-thumbnail~.card-icon-open:hover {
    opacity: 1;
}

.modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 10;
    width: 100%;
    height: 100%;
    background: rgba(21, 21, 21, .75);
}

.modal-body {
    position: absolute;
    top: 50%;
    left: 50%;
    z-index: 11;
    padding: 0;
    overflow: auto;
    max-width: 100%;
    max-height: 100%;
    border-radius: 4px;
    transform: translate(-50%, -50%);
}

.modal-close {
    position: absolute;
    top: 0;
    right: 8px;
    font-size: 1.5rem;
    color: #111;
    transition: all 0.25s ease-in-out;
}

.modal-close:focus,
.modal-close:hover {
    color: #fff;
}
</style>

<body>
    <!-- Include any common header or navigation components here -->

    <div class="blog-dtl-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- Render the content of DetailsofContent component here -->
                    <!-- Add any necessary PHP logic to display content -->
                    <h1 class="h1-heading-fntsz"><?= $blogData[
                        "title"
                    ] ?> - newworldtrending</h1>
                    <p class="date-fntvw"><?= $blogData[
                        "publishedDate"
                    ] ?> By <?= $blogData["author"] ?></p>
                   
                    <?php
                    // Include your ImageSlider component logic here
                    $bannerImage = $imgUrl . $blogData["banner"][0] ?? "";
                    echo '<img src="' .
                        $bannerImage .
                        '" class="img-fluid rounded blg-dtl-img banner-img" alt="example">';
                    ?>

                        <?php
                        // Include your SocialIcons component logic here
                        $facebookLink = $blogData["facebookLink"];
                        $instagramLink = $blogData["instagramLink"];
                        $youtubeLink = $blogData["youtubeLink"];

                        echo '<div class="d-flex mt-3 mb-3 social-icon-outer">';
                        if ($facebookLink) {
                            echo '<div class="social-icon-box">';
                            echo '<a href="' .
                                $facebookLink .
                                '" target="_blank" rel="noopener noreferrer">';
                            echo '<i class="bi bi-facebook fs-4"></i>';
                            echo "</a>";
                            echo "</div>";
                        }

                        if ($instagramLink) {
                            echo '<div class="social-icon-box ms-2">';
                            echo '<a href="' .
                                $instagramLink .
                                '" target="_blank" rel="noopener noreferrer">';
                            echo '<i class="bi bi-instagram fs-4"></i>';
                            echo "</a>";
                            echo "</div>";
                        }

                        if ($youtubeLink) {
                            echo '<div class="social-icon-box ms-2">';
                            echo '<a href="' .
                                $youtubeLink .
                                '" target="_blank" rel="noopener noreferrer">';
                            echo '<i class="bi bi-youtube fs-4"></i>';
                            echo "</a>";
                            echo "</div>";
                        }
                        echo "</div>";
                        ?>

                        <?php // Include the content using dangerouslySetInnerHTML
                        echo "<div>" . $blogData["content"] . "</div>"; ?>
                        
  <div class="container-fluid gallery-container">
    <div class="row">
        <?php foreach ($blogData["featuredImages"] as $index => $url): ?>
            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="gallery-card">
                    <img class="gallery-thumbnail" src="<?= $imgUrl. $url ?>" alt="Image number <?= $index + 1 ?>">
                    
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
                        
                        
                        
                        
      <div class="blg-dtl-boxvw mt-3">
        <h5 class="h5-tag-fntsz">Leave a Comment</h5>
        <form>
          <textarea
            name=""
            id=""
            cols={30}
            rows={10}
            class="search-blg-input mt-2"
            placeholder="Say something ..."
          ></textarea>
          <input
            type="text"
            class="search-blg-input mt-2"
            placeholder="Name*"
          />
          <input
            type="email"
            class="search-blg-input mt-2"
            placeholder="Email*"
          />
          <input
            type="text"
            class="search-blg-input mt-2"
            placeholder="Website*"
          />
          <div class="mb-3 d-flex mt-3">
            <input
              type="checkbox"
              class="form-check-input"
              id="exampleCheck1"
            />
            <label class="ms-2 check-label" htmlFor="exampleCheck1">
              Save my name, email, and website in this browser for the next time
              I comment.
            </label>
          </div>
          <div>
            <button class="post-comment-btn" type="button">Post Comment</button>
          </div>
        </form>
      </div>
                        

                    </div>

                   
                   





                   
                   
                <div class="col-md-4"; style="height: min-content">
                    <div class="blg-dtl-boxvw mt-3">
        <form action="" class="d-flex mb-8 ">
          <input
            type="text"
            placeholder="Search here..."
            class="search-blg-input"
          />
          <div class="search-iconbox">
            <i class="bi bi-search fs-5"></i>
          </div>
        </form>
      </div>


      <!-- craousal -->
      <div class="container " style="min-content">
  <div id="myCarousel" class="carousel slide  col-md-3 margin-top:6% " style="margin-top:6% " data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
     
    <div class="item active">
    <div class="blg-dtl-boxvw mt-3">
    <h5 class="h5-tag-fntsz">Tags</h5>
    <?php if (!empty($blogData["tags"])): ?>
        <?php foreach ($blogData["tags"] as $index => $item): ?>
            <a href="#">
                <h6 class="linking-fnt-sz mt-none"><?= $item ?></h6>
            </a>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
    </div>
    

        <div class="item">
        <div class="blg-dtl-boxvw mt-3">
    <h5 class="h5-tag-fntsz">Categories</h5>
    <?php if (!empty($blogData["categories"])): ?>
        <?php foreach ($blogData["categories"] as $index => $item): ?>
            <a href="#">
                <h6 class="linking-fnt-sz"><?= $item ?></h6>
            </a>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
        </div>



    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
      <!-- craousal -->

      
      
     











 

                </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include any common footer components here -->

    <!-- Add other HTML and components as needed -->
</body>

</html>
