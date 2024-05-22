<!-- templates/dogs.xsl -->
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html" encoding="UTF-8" indent="yes"/>
    <xsl:template match="dogs">
        <html>
            <head>
                <title>Community Dog Lost and Found</title>
                <link rel="stylesheet" type="text/css" href="dstyle.css"/>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
                <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"/>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
                
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast/dist/css/iziToast.min.css"/>
                <script src="https://cdn.jsdelivr.net/npm/izitoast/dist/js/iziToast.min.js"></script>
                <script>
                function validateForm() {
                    var photo = document.getElementById('photo');
                    var dogname = document.getElementById('dogname');
                    var contact = document.getElementById('contact');
                    var reward = document.getElementById('reward');
                    if (photo.value === '' || dogname.value === '' || contact.value === '' || reward.value === '') {
                    iziToast.show({
                        backgroundColor: '#ff5e41',
                        messageColor: '#ffffff',
                        message: 'Please fill out the input field.',
                        position: 'topRight'
                    });
                    return false;
                    }
                    return true;
                }
                </script>
            </head>
            <body>
                <!-- Modal -->
                <div class="modal fade" id="adddog" tabindex="-1" aria-labelledby="adddog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="adddogLabel">Add new dog list</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form onsubmit="return validateForm()" id="addcase-form" action="add.php" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group mb-3">
                                <label for="photo" class="form-label">Dog Photo</label>
                                <input class="form-control" name="photo" type="file" id="photo" accept="image/*"/>
                            </div>
                            <div class="form-group mb-3">
                                <label for="dogname">Dog Name</label>
                                <input type="text" id="dogname" class="form-control" name="dogname" />
                            </div>
                            <div class="form-group mb-3">
                                <label for="contact">Contact Info</label>
                                <input type="text" id="contact" class="form-control" name="contact" />
                            </div>
                            <div class="form-group mb-3">
                                <label for="reward">Reward</label>
                                <input type="text" id="reward" class="form-control" name="reward"/>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="add" class="addbtn">Save</button>
                        </div>
                    </form>
                    </div>
                </div>
                </div>
                <div class="header">
                    <h1 id="headertitle">Community Dog Lost and Found</h1>
                    <a href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
                </div>
                <div class="headermain-text">
                    <h3>list of dogs</h3>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#adddog">Add new</button>
                </div>
                <div class="main-con">
                   <xsl:for-each select="dog">
                        <div class="card" style="background-collor: #fff"> 
                            <img src="assets/{photo}" class="card-img-top" alt="Card Image"/>
                            <div class="card-body">
                                <h5 class="card-title">Name: <xsl:value-of select="name"/></h5>
                                <p class="card-text">
                                    Contact: <xsl:value-of select="contact"/>
                                    <br/>
                                    Reward: <xsl:value-of select="reward"/>
                                </p>
                            </div>
                        </div>
                    </xsl:for-each>
                </div>
                <script src="script.js"></script>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
