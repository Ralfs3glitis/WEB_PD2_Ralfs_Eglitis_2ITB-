import { useEffect, useState } from "react";
import '../css/loader.css';

const topBooks = [
    {
        "id": 3,
        "name": "Half Life 3",
        "description": "WOW hl3",
        "author": "Gabe Newell",
        "genre": "Action",
        "price": "5.99",
        "year": 2025,
        "image": "http://localhost/images/679c66551e21a.png"
    },
    {
        "id": 1,
        "name": "The Hobbit",
        "description": "The Hobbit, or There and Back Again is a children's fantasy novel by English author J. R. R. Tolkien. It was published in 1937 to wide critical acclaim, being nominated for the Carnegie Medal and awarded a prize from the New York Herald Tribune for best juvenile fiction. The book is recognized as a classic in children's literature and is one of the best-selling books of all time, with over 100 million copies sold.\r\n\r\nThe Hobbit is set in Middle-earth and follows home-loving Bilbo Baggins, the hobbit of the title, who joins the wizard Gandalf and the thirteen dwarves of Thorin's Company, on a quest to reclaim the dwarves' home and treasure from the dragon Smaug. Bilbo's journey takes him from his peaceful rural surroundings into more sinister territory.\r\n\r\nThe story is told in the form of a picaresque or episodic quest;[1] several chapters introduce a new type of monster or threat as Bilbo progresses through the landscape. Bilbo gains a new level of maturity, competence, and wisdom by accepting the disreputable, romantic, fey, and adventurous sides of his nature and applying his wits and common sense. The story reaches its climax in the Battle of Five Armies, where many of the characters and creatures from earlier chapters re-emerge to engage in conflict. Personal growth and forms of heroism are central themes of the story, along with motifs of warfare. These themes have led critics to view Tolkien's own experiences during World War I as instrumental in shaping the story. The author's scholarly knowledge of Germanic philology and interest in mythology and fairy tales are often noted as influences, but more recent fiction including adventure stories and the works of William Morris also played a part.\r\n\r\nThe publisher was encouraged by the book's critical and financial success and, therefore, requested a sequel. As Tolkien's work progressed on its successor, The Lord of the Rings, he made retrospective accommodations for it in The Hobbit. These few but significant changes were integrated into the second edition. Further editions followed with minor emendations, including those reflecting Tolkien's changing concept of the world into which Bilbo stumbled. The work has never been out of print. Its ongoing legacy encompasses many adaptations for stage, screen, radio, board games, and video games. Several of these adaptations have received critical recognition on their own merits.",
        "author": "J.R.R. Tolkien",
        "genre": "Adventure",
        "price": "14.99",
        "year": 1937,
        "image": "http://localhost/images/679c655e5ff0f.jpg"
    },
    {
        "id": 2,
        "name": "Game Of Thrones",
        "description": "Who will sit upon the throne?",
        "author": "G.R.R Martin",
        "genre": "Dark fantasy",
        "price": "19.99",
        "year": 1992,
        "image": "http://localhost/images/679c6618ee581.jpg"
    }
]

const selectedBook = {
    "id": 3,
    "name": "Half Life 3",
    "description": "WOW hl3",
    "author": "Gabe Newell",
    "genre": "Action",
    "price": "5.99",
    "year": 2025,
    "image": "http://localhost/images/679c66551e21a.png"
}

const relatedBooks = [
    {
        "id": 1,
        "name": "The Hobbit",
        "description": "The Hobbit, or There and Back Again is a children's fantasy novel by English author J. R. R. Tolkien. It was published in 1937 to wide critical acclaim, being nominated for the Carnegie Medal and awarded a prize from the New York Herald Tribune for best juvenile fiction. The book is recognized as a classic in children's literature and is one of the best-selling books of all time, with over 100 million copies sold.\r\n\r\nThe Hobbit is set in Middle-earth and follows home-loving Bilbo Baggins, the hobbit of the title, who joins the wizard Gandalf and the thirteen dwarves of Thorin's Company, on a quest to reclaim the dwarves' home and treasure from the dragon Smaug. Bilbo's journey takes him from his peaceful rural surroundings into more sinister territory.\r\n\r\nThe story is told in the form of a picaresque or episodic quest;[1] several chapters introduce a new type of monster or threat as Bilbo progresses through the landscape. Bilbo gains a new level of maturity, competence, and wisdom by accepting the disreputable, romantic, fey, and adventurous sides of his nature and applying his wits and common sense. The story reaches its climax in the Battle of Five Armies, where many of the characters and creatures from earlier chapters re-emerge to engage in conflict. Personal growth and forms of heroism are central themes of the story, along with motifs of warfare. These themes have led critics to view Tolkien's own experiences during World War I as instrumental in shaping the story. The author's scholarly knowledge of Germanic philology and interest in mythology and fairy tales are often noted as influences, but more recent fiction including adventure stories and the works of William Morris also played a part.\r\n\r\nThe publisher was encouraged by the book's critical and financial success and, therefore, requested a sequel. As Tolkien's work progressed on its successor, The Lord of the Rings, he made retrospective accommodations for it in The Hobbit. These few but significant changes were integrated into the second edition. Further editions followed with minor emendations, including those reflecting Tolkien's changing concept of the world into which Bilbo stumbled. The work has never been out of print. Its ongoing legacy encompasses many adaptations for stage, screen, radio, board games, and video games. Several of these adaptations have received critical recognition on their own merits.",
        "author": "J.R.R. Tolkien",
        "genre": "Adventure",
        "price": "14.99",
        "year": 1937,
        "image": "http://localhost/images/679c655e5ff0f.jpg"
    },
    {
        "id": 4,
        "name": "The Lord of the Rings trilogy",
        "description": "Best books, best movies",
        "author": "J.R.R. Tolkien",
        "genre": "Fantasy",
        "price": "39.99",
        "year": 1956,
        "image": "http://localhost/images/679c6a3a2eed2.jpg"
    },
    {
        "id": 2,
        "name": "Game Of Thrones",
        "description": "Who will sit upon the throne?",
        "author": "G.R.R Martin",
        "genre": "Dark fantasy",
        "price": "19.99",
        "year": 1992,
        "image": "http://localhost/images/679c6618ee581.jpg"
    }
]

// Main application component
export default function App() {
    const [selectedBookID, setSelectedBookID] = useState(null);
    const [error, setError] = useState(null);

    // function to store Book ID in state
    function handleBookSelection(bookID) {
        setSelectedBookID(bookID);
    }
    // function to clear Book ID from state
    function handleGoingBack() {
        setSelectedBookID(null);
    }
    return (
        <>
            <Header />
            <main className="mb-8 px-2 md:container md:mx-auto">
                {
                    selectedBookID
                        ? <BookPage
                            selectedBookID={selectedBookID}
                            handleBookSelection={handleBookSelection}
                            handleGoingBack={handleGoingBack}
                        />
                        : <Homepage handleBookSelection={handleBookSelection} />
                }
            </main>
            <Footer />
        </>
    )
}


function Header() {
    return (
        <header className="bg-green-500 mb-8 py-2 sticky top-0">
            <div className="px-2 py-2 font-serif text-green-50 text-xl leading-6
md:container md:mx-auto">
                Project 2
            </div>
        </header>
    )
}
function Footer() {
    return (
        <footer className="bg-neutral-300 mt-8">
            <div className="py-8 md:container md:mx-auto px-2">
                R. Eglītis, VeA, 2025
            </div>
        </footer>
    )
}

// Top Book View - displays books on Homepage
function TopBookView({ book, index, handleBookSelection }) {
    return (
        <div className="bg-neutral-100 rounded-lg mb-8 py-8 flex flex-wrap md:flex-row">
            <div className=
                {`order-2 px-12 md:basis-1/2
     ${index % 2 === 1 ? "md:order-1 md:text-right" : ""}
     `}
            >
                <p className="mb-4 text-3xl leading-8 font-light text-neutral-900">
                    {book.name}
                </p>
                <p className="mb-4 text-xl leading-7 font-light text-neutral-900 mb-4">
                    {(book.description.split(' ').slice(0, 16).join(' ')) + '...'}
                </p>
                <SeeMoreBtn
                    bookID={book.id}
                    handleBookSelection={handleBookSelection}
                />
            </div>
            <div className=
                {`order-1 md:basis-1/2 ${index % 2 === 1 ? "md:order-2" : ""}`}
            >
                <img
                    src={book.image}
                    alt={book.name}
                    className="p-1 rounded-md border border-neutral-200 w-2/4 aspect-auto
    mx-auto" />
            </div>
        </div>
    )
}
// See More Button
function SeeMoreBtn({ bookID, handleBookSelection }) {
    return (
        <button
            className="inline-block rounded-full py-2 px-4 bg-sky-500 hover:bgsky-400 text-sky-50 cursor-pointer"
            onClick={() => handleBookSelection(bookID)}
        >See more</button>
    )
}
// Book page component- structural component that contains parts of the book page
function BookPage({ selectedBookID, handleBookSelection, handleGoingBack }) {
    return (
        <>
            <SelectedBookView
                selectedBookID={selectedBookID}
                handleGoingBack={handleGoingBack}
            />
            <RelatedBookSection
                selectedBookID={selectedBookID}
                handleBookSelection={handleBookSelection}
            />
        </>
    )
}
// Selected Book View - displays selected book details
function SelectedBookView({ selectedBookID, handleGoingBack }) {
    const [selectedBook, setSelectedBook] = useState({});
    const [isLoading, setIsLoading] = useState(false);
    const [error, setError] = useState(null);
    useEffect(function () {
        async function fetchSelectedBook() {
            try {
                setIsLoading(true);
                setError(null);
                const response = await fetch('http://localhost/data/get-book/' +
                    selectedBookID);
                if (!response.ok) {
                    throw new Error("Error while loading data. Please reload page!");
                }
                const data = await response.json();
                console.log('book ' + selectedBookID + ' fetched', data);
                setSelectedBook(data);
            } catch (error) {
                setError(error.message);
            } finally {
                setIsLoading(false);
            }
        }
        fetchSelectedBook();
    }, [selectedBookID]);
    return (
        <>
            {isLoading && <Loader />}
            {error && <ErrorMessage msg={error} />}
            {!isLoading && !error && <>
                <div className="rounded-lg flex flex-wrap md:flex-row">
                    <div className="order-2 md:order-1 md:pt-12 md:basis-1/2">
                        <h1 className="text-3xl leading-8 font-light text-neutral-900">
                            {selectedBook.name}
                        </h1>
                        ... all the book details here ...
                    </div>
                </div>
                <div className="mb-12 flex flex-wrap">
                    <GoBackBtn handleGoingBack={handleGoingBack} />
                </div>
            </>}
        </>
    )
}
// Go Back Button
function GoBackBtn({ handleGoingBack }) {
    return (
        <button
            className="inline-block rounded-full py-2 px-4 bg-neutral-500
    hover:bg-neutral-400 text-neutral-50 cursor-pointer"
            onClick={handleGoingBack}
        >Back</button>
    )
}
// Related Book Section
function RelatedBookSection({ selectedBookID, handleBookSelection }) {
    return (
        <>
            <div className="flex flex-wrap">
                <h2 className="text-3xl leading-8 font-light text-neutral-900 mb4">
                    Similar books
                </h2>
            </div>
            <div className="flex flex-wrap md:flex-row md:space-x-4 md:flexnowrap">
                {relatedBooks.map(book => (
                    <RelatedBookView
                        book={book}
                        key={book.id}
                        handleBookSelection={handleBookSelection}
                    />
                ))}
            </div>
        </>
    )
}
// Related Book View
function RelatedBookView({ book, handleBookSelection }) {
    return (
        <div className="rounded-lg mb-4 md:basis-1/3">
            <img
                src={book.image}
                alt={book.name}
                className="md:h-[400px] md:mx-auto max-md:w-2/4 max-md:mx-auto" />
            <div className="p-4">
                <h3 className="text-xl leading-7 font-light text-neutral-900 mb4">
                    {book.name}
                </h3>
                <SeeMoreBtn
                    bookID={book.id}
                    handleBookSelection={handleBookSelection}
                />
            </div>
        </div>
    )
}
// Loader and Error Message components
function Loader() {
    return (
        <div className="my-12 px-2 md:container md:mx-auto text-center clear-both">
            <span class="loader"></span>
        </div>
    )
}
function ErrorMessage({ msg }) {
    return (
        <div className="md:container md:mx-auto bg-red-300 my-8 p-2">
            <p className="text-black">{msg}</p>
        </div>
    )
}
// Homepage- loads data from API and displays top books
function Homepage({ handleBookSelection }) {
    const [topBooks, setTopBooks] = useState([]);
    const [isLoading, setIsLoading] = useState(false);
    const [error, setError] = useState(null);
    useEffect(function () {
        async function fetchTopBooks() {
            try {
                setIsLoading(true);
                setError(null);
                const response = await fetch('http://localhost/data/get-top-books');
                if (!response.ok) {
                    throw new Error("Error while loading data. Please reload page!");
                }
                const data = await response.json();
                console.log('top books fetched', data);
                setTopBooks(data);
            } catch (error) {
                setError(error.message);
            } finally {
                setIsLoading(false);
            }
        }
        fetchTopBooks();
    }, []);
    return (
        <>
            {isLoading && <Loader />}
            {error && <ErrorMessage msg={error} />}
            {!isLoading && !error && (
                topBooks.map((book, index) => (
                    <TopBookView
                        book={book}
                        key={book.id}
                        index={index}
                        handleBookSelection={handleBookSelection}
                    />
                ))
            )}
        </>
    )
}