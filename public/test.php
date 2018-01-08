<html>
<head>

</head>
<body>
<div class="jumbotron">
    <div class="container">
        <ngb-alert type="success" [dismissible]="false">
            Bootstrap is working!
        </ngb-alert>

        <h1>
            <i class="fa fa-bath" aria-hidden="true"></i>
            And so is Font Awesome!
        </h1>
    </div>
</div>

<div class="container">
    <p>
        A progress bar:
        <ngb-progressbar showValue="true" type="success" [value]="65">
        </ngb-progressbar>
    </p>
</div>

<div class="container">
    <ngb-tabset>
        <ngb-tab title="Bacon">
            <ng-template ngbTabContent>
                <p class="mt-4">Content for tab 1.
                    <button type="button"
                            class="btn btn-secondary"
                            placement="bottom"
                            ngbPopover="A popover in tab 1"
                            popoverTitle="Bacon is good">
                        Click me
                    </button>
                </p>
            </ng-template>
        </ngb-tab>
        <ngb-tab title="Lettuce">
            <ng-template ngbTabContent>
                <p>Content for tab 2</p>
            </ng-template>
        </ngb-tab>
        <ngb-tab title="Tomatoes">
            <ng-template ngbTabContent>
                <p>Content for tab 3</p>
            </ng-template>
        </ngb-tab>
    </ngb-tabset>
</div>
</body>
</html>